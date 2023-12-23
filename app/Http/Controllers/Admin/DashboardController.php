<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;


class DashboardController extends Controller
{

    public function __construct()
    {
        
    }

    public function dashboard()
    {
        $success = ['Welcome to Admin Dashboard'];
        return view('admin-views.system.dashboard',compact('success'));
    }

    public function add_shipment()
    {
        return view('admin-views.shipment.add-shipment');
    }

    public function get_parcelfields($index)
    {
        // Your logic to retrieve the content of the _parcel-fields view
        $parcelFields = view('admin-views.shipment.partials._parcel-fields', ['index' => $index])->render();
        return response()->json(['parcelFields' => $parcelFields]);
    }

    public function shipping_label($shippingid)
    {

        $shipment = Shipment::with(['deliveryAddress','pickupAddress'])->find($shippingid);
        return view('admin-views.shipment.shipping-label',['shipment'=>$shipment]);
    }

    public function shipping_invoice($shippingid)
    {

        $shipment = Shipment::with(['deliveryAddress','pickupAddress'])->find($shippingid);
        return view('admin-views.shipment.shipping-invoice',['shipment'=>$shipment]);
    }
}