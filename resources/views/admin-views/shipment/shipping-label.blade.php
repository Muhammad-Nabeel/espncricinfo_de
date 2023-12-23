<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shipping Label</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/assets/back-end')}}/css/bootstrap.min.css">
  </head>
  <body>
    <div class="print-shipping" style="width: 100%; max-width: 500px;">
        <h1>Shipping Label</h1>
       
         <div class="d-flex justify-content-between">
            <div class="col border border-1 p-2"> <img height="30" src="{{asset('/assets/front-end')}}/img/logo/logo.png" alt=""></div>
             <div class="col border border-1 p-2">Purchase Order: {{ $shipment->purchase_order_number }}</div>
            <div class="col border border-1 p-2"> {{ Carbon\Carbon::parse($shipment->deliveryAddress->created_at)->format('d-M-Y') }}</div>
        </div>
        <div class="d-flex align-items-start flex-column bd-highlight border border-1">
            <div class="p-3">
                <h4 class="fz-12 mb-1">Origin </h4>
                <p>
                    <span>
                        {{ $shipment->pickupAddress->consignor }}, {{ $shipment->pickupAddress->country }}
                    </span>
                        <br>
                        <span>
                        Contact Number : {{ $shipment->pickupAddress->contact }}
                    </span>
                </p>  
            </div>
        </div>
        <div class="d-flex align-items-start flex-column bd-highlight border border-1">
            <div class="p-3">
                <h4 class="fz-12 mb-1">Delivery Info </h4>
                <p>
                    <span>
                        {{ $shipment->deliveryAddress->consignor }}, {{ $shipment->deliveryAddress->country }}
                    </span>
                        <br>
                        <span>
                        Consignment Number : {{ $shipment->consignment_number }}
                    </span> <br />
                    <span>Contact Number : {{ $shipment->deliveryAddress->contact }}</span>
                </p>  
            </div>
        </div>

        @php

            $parcels = App\Models\Parcel::where('shipment_id', $shipment->id)->get();
            $numberOfPieces = $parcels->sum('pieces');
            $totalWeight = $parcels->sum('weight');
        @endphp
        
        <div class="d-flex justify-content-evenly border border-1">
            <div class="col-8 justify-content-evenly">
                <div class="border border-1">{{ $numberOfPieces }} Peice(s) & Package Weight: {{  $totalWeight }} KG <br/>
                    Print Date: {{ Carbon\Carbon::parse(now())->format('d-M-Y') }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/assets/back-end')}}/js/popper.js"></script>
    <script src="{{asset('/assets/back-end')}}/js/bootstrap.min.js"></script>
  </body>
</html>