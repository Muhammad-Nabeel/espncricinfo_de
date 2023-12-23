<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\Parcel;
use App\Models\PickupAddress;
use App\Models\DeliveryAddress;
use App\Models\ShipmentTrackingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShipController extends Controller
{

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'ship_country' => 'required',
            'consignment_number' => 'required',
            'purchase_order_number' => 'required',
            'ref2' => 'nullable',
            'invoice_type'=> 'nullable',
            'third_party_email' => 'nullable|email',
            'notification_email' => 'nullable|email',

            'consignor' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'town' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'contact' => 'required',
            'telephone' => 'required',
            'consignee_email' => 'nullable|email',

            'p_consignor' => 'required',
            'p_address_line_1' => 'required',
            'p_address_line_2' => 'nullable',
            'p_town' => 'required',
            'p_country' => 'required',
            'p_postal_code' => 'required',
            'p_contact' => 'required',
            'p_telephone' => 'required',
            'p_consignee_email' => 'nullable|email',
            // Add validation rules for parcel data here if necessary
        ]);

        // Create a new shipment record in your database
        $shipment = new Shipment();
        $shipment->country = $request->input('ship_country');
        $shipment->consignment_number = $request->input('consignment_number');
        $shipment->purchase_order_number = $request->input('purchase_order_number');
        $shipment->ref2 = $request->input('ref2');
        //new added feilds
        $shipment->invoice_type = $request->input('invoice_type');
        $shipment->service_charges = $request->input('service_charges');
        
        $shipment->third_party_email = $request->input('third_party_email');
        $shipment->notification_email = $request->input('notification_email');
        // Add other shipment fields
        $shipment->save();

        // Create pickup and delivery addresses
        $pickupAddress = new PickupAddress();
        $pickupAddress->consignor = $request->input('p_consignor');
        $pickupAddress->address_line_1 = $request->input('p_address_line_1');
        $pickupAddress->address_line_2 = $request->input('p_address_line_2');
        $pickupAddress->town = $request->input('p_town');

        //new added feilds
        $pickupAddress->p_cnic = $request->input('p_cnic');
        $pickupAddress->p_companyname = $request->input('p_companyname');
        
        $pickupAddress->country = $request->input('p_country');
        $pickupAddress->postal_code = $request->input('p_postal_code');
        $pickupAddress->contact = $request->input('p_contact');
        $pickupAddress->telephone = $request->input('p_telephone');
        $pickupAddress->consignee_email = $request->input('p_consignee_email');
        // Add other pickup address fields
        $shipment->pickupAddress()->save($pickupAddress);

        $deliveryAddress = new DeliveryAddress();
        $deliveryAddress->consignor = $request->input('consignor');
        $deliveryAddress->address_line_1 = $request->input('address_line_1');
        $deliveryAddress->address_line_2 = $request->input('address_line_2');
        $deliveryAddress->town = $request->input('town');
        $deliveryAddress->country = $request->input('country');
        $deliveryAddress->postal_code = $request->input('postal_code');
        $deliveryAddress->contact = $request->input('contact');
        $deliveryAddress->telephone = $request->input('telephone');
        $deliveryAddress->consignee_email = $request->input('consignee_email');
        $shipment->deliveryAddress()->save($deliveryAddress);
        // Populate delivery address fields similarly

         // Create shipment tracking event
        $shipmentTracking = new ShipmentTrackingEvent([
            'event' => 'pending',
            'event_date' => now(),
            'location' => $request->input('country'),
            'notes' => 'Shipment Created Successfully!..',
        ]);
        $shipment->trackingEvents()->save($shipmentTracking);

        // Handle the parcel data (assuming it's a separate model)
        $parcelData = $request->input('parcels');
        if(isset($parcelData) && count($parcelData) > 0){
            foreach ($parcelData as $parcel) {
                $newParcel = new Parcel($parcel);
                 // Associate the parcel with the shipment by setting the shipment_id
                $newParcel->shipment_id = $shipment->id;
                $newParcel->save(); // Associate the parcel with the shipment
            }
        } else {
            $error = ['Parcel Information is Incorrect'];
            return view('admin-views.shipment.add-shipment',compact('error'));
            //return response()->json(['error' => 'Parcel Information is Incorrect'], 500);
        }

        $success = ['Shipment added successfully!'];
        return view('admin-views.shipment.add-shipment',compact('success'));
        // Return a response indicating success
        //return response()->json(['success' => 'Shipment added successfully!'], 200);
    }

    public function update_shipment()
    {
        // Fetch all shipments with related tracking events and parcels
        $shipments = Shipment::with(['trackingEvents','deliveryAddress'])->orderBy('created_at', 'desc')->get();
        return view('admin-views.shipment.update-shipment', compact('shipments'));
    }

    public function get_trackstatus_fields(Request $request)
    {
        $shipmentId = $request->input('shipment_id');

        // Your logic to retrieve the content of the _trackinginputs view
        $trackstatusInputs = view('admin-views.shipment.partials._trackinginputs', ['shipment_id' => $shipmentId])->render();

        return response()->json(['trackstatusInputsView' => $trackstatusInputs]);
    }

    public function track_status(Request $request)
    {
        $trackingEvents = Shipment::where(function ($query) use ($request) {
            $query->where('id', $request->id)
                ->orWhere('consignment_number', $request->consignment_number);
        })
        ->first()
        ->trackingEvents;
        // $shipment now contains the shipment details along with its related tracking events
        // Your logic to retrieve the content of the _tracking view
        $trackingView = view('admin-views.shipment.partials._trackingcontent', ['trackingEvents' => $trackingEvents])->render();
        return response()->json(['trackingView' => $trackingView]);
    }

    public function update_track_status(Request $request){
       
        $notes = $request->notes ?? '';
        // If no event with the same status exists, create a new tracking event
        ShipmentTrackingEvent::updateOrInsert(
            ['shipment_id' => $request->shipment_id, 'event' => $request->status],
            [
                'event_date' => now(), // or use your desired timestamp
                'location' => $request->location ?? 'N/A', // Replace with the default location
                'notes' => $notes, // Replace with the default notes
                'created_at' => now(), // or use your desired timestamp
                'updated_at' => now(), // or use your desired timestamp
            ]
        );
        // You can return a response or perform additional actions as needed
        return response()->json(['success' => 'Shipment status changed successfully']);
    }    
}
