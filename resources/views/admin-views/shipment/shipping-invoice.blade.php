<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shipping Label</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/assets/back-end')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/assets/back-end/css/bootstrap.min.css') }}" media="print">
    <style media="print">
        .table {
        	--bs-table-bg: transparent;
        	--bs-table-accent-bg: transparent;
        	--bs-table-striped-color: #212529;
        	--bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        	--bs-table-active-color: #212529;
        	--bs-table-active-bg: rgba(0, 0, 0, 0.1);
        	--bs-table-hover-color: #212529;
        	--bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        	width: 100%;
        	margin-bottom: 1rem;
        	color: #212529;
        	vertical-align: top;
        	border-color: #dee2e6;
        }

        .print-bill {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .border {
            border: 1px solid #000;
        }

        .print-bill h1 {
            font-size: 24px;
        }

        /* Additional styling for other classes */
        .logo img {
            max-width: 100%;
            padding:10px;
            background-color:#000c1f;
        }
        
    </style>
  </head>
  <body>
    <div class="container">

        <div class="print-invoice py-5">
            <div class="border border-3 d-block"></div>
            <div class="d-flex p-3 justify-content-between">
                <h1>{{ isset($shipment->invoice_type) ? $shipment->invoice_type : 'N/A' }} Invoice</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Airway Bill Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Invoice #:</th>
                    <th scope="col">Number of Pieces:</th>
                    <th scope="col">Total Weight:</th>
                </tr>
                </thead>
                <tbody>
                @php

                    $parcels = App\Models\Parcel::where('shipment_id', $shipment->id)->get();
                    $numberOfPieces = $parcels->sum('pieces');
                    $totalWeight = $parcels->sum('weight');
                @endphp
                <tr>
                    <td>{{ $shipment->consignment_number }}</td>
                    <td>{{ Carbon\Carbon::parse($shipment->created_at)->format('d-M-Y') }}</td>
                    <td>{{ $shipment->purchase_order_number }}</td>
                    <td>{{ $numberOfPieces }}</td>
                    <td>{{ $totalWeight }} KG</td>
                </tr>
                
                <tr>
                    <td colspan="5">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Shipper Address:</th>                    
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td>{{ $shipment->pickupAddress->address_line_1 }} <br /> {{ $shipment->deliveryAddress->contact }} </td>                    
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="5">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Ship To Address:</th>                    
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $shipment->deliveryAddress->address_line_1 }} <br /> {{ $shipment->deliveryAddress->contact }} </td>                    
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <h4>Your Ordered Items:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial #</th>
                        <th scope="col">Details of Goods</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Sub Total</th>
                    </tr>
                </thead>
                <tbody>

                @php

                $parcels = App\Models\Parcel::where('shipment_id', $shipment->id)->get();
                $totalPrice = $parcels->sum('price');
                @endphp
                    @foreach ($parcels as $index => $item)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ isset($item['parcel_details']) ? $item['parcel_details'] : 'N/A' }}</td>
                            <td>{{ isset($item['pieces']) ? $item['pieces'] : 'N/A' }}</td>
                            <td>{{ isset($item['price']) ? $item['price'] : 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex">
                <div class="col-8"></div>
                <div class="col-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Other</th>
                            <td>N/A</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Invoice Total</th>
                            <td>{{ $totalPrice }} USD</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="">
                <b>Note:</b>
                I/We here by delcare that the information on this invoice is true and correct and that the contents of the shipment are as stated above. <br />
                I/We hereby certify that this shipment having does not contain any drugs,Narcotics,Contraband items or all IATA restricted items, if any such material is discovered from this shipment, <br />
                I shall be held responsible. And i am taking full responsibility of freight payment. <br />
                if the shipment is break shipper is totally responsible for breakage.
            </div>
            <div class="w-100 text-center d-block">
                <div><b>Email:</b> support@jnkwwe.com</div>
                <div><b>Phone:</b> +92 321 8311850</div>
                <div><b>jnkwwe.com</b></div>
                <div><b>All Copy Rights Reserved © 2023 JNKWWE.COM</b></div>
            </div>
            </div>
        </div>

        <div style="page-break-before: always;"></div>
        
        <div class="print-bill container py-5">
    <div class="d-flex p-3 justify-content-between">
        <h1>Customer Bill</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <td colspan="1" class="logo" style="background-color:#000c1f;">
                        <img src="{{asset('/assets/front-end')}}/img/logo/logo.png" alt="JNKWWE-LOGO">
                    </td>
                    <td colspan="1" >
                        <h5>Date:</h5>
                        <p>{{ Carbon\Carbon::parse($shipment->created_at)->format('d-M-Y') }}</p>
                    </td>
                    <td colspan="1">
                    <h5>Airway Bill No:</h5>
                     <p>{{ $shipment->consignment_number }} </p>
                    </td>
                    <td colspan="1">
                        <h5>Service:</h5>
                        <p>{{ $shipment->ref2 }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <h5>Shipper Name</h5>
                        <p>{{ $shipment->pickupAddress->consignor }}</p>
                    </td>
                    <td colspan="2" >
                        <h5>Reciever's Name:</h5>
                        <p>{{ $shipment->deliveryAddress->consignor }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <h5>Street Address:</h5>
                        <p>{{ $shipment->pickupAddress->address_line_1 }} <br /> {{ $shipment->pickupAddress->address_line_2 }}</p>
                    </td>
                    <td colspan="2" >
                        <h5>Street Address 1:</h5>
                        <p>{{ $shipment->deliveryAddress->address_line_1 }} <br /> {{ $shipment->deliveryAddress->address_line_2 }}, {{ $shipment->deliveryAddress->town }}, {{ $shipment->deliveryAddress->country }} </p>
                    </td>
                </tr>
                <tr>
                    <td >
                        <h5>City</h5>
                        <p>{{ $shipment->pickupAddress->town }}</p>
                    </td>
                    <td >
                        <h5>Country:</h5>
                        <p>{{ $shipment->pickupAddress->country }}</p>
                    </td>
                    <td colspan="2" >
                        <h5>Reciever Phone:</h5>
                        <p>{{ $shipment->deliveryAddress->contact }}</p>
                    </td>
                </tr>
                <tr>
                    
                    <td colspan="1">
                        <h5>ID:</h5>
                        <p> {{ isset($shipment->pickupAddress->p_cnic) ? $shipment->pickupAddress->p_cnic : 'N/A' }} </p>
                    </td>
                    <td colspan="1">
                        <h5>Value & Currency:</h5>
                        <p>{{ $totalPrice }} USD</p>
                    </td>
                    <td colspan="2" >
                        <h5>  Service  Charges:</h5>
                        <p>{{ isset($shipment->service_charges) ? $shipment->service_charges : 'N/A' }} PKR </p>
                    </td>
                   
                </tr>
                <!-- ... (Add other rows as needed) ... -->
                <tr>
                    <td colspan="2">
                        <h5>Description of Contents:</h5>
                        <p>
                        @foreach ($parcels as $index => $item)
                            
                        {{ isset($item['parcel_details']) ? $item['parcel_details'] : 'N/A' }} - {{ isset($item['pieces']) ? $item['pieces'] : 'N/A' }}
                            
                        @endforeach
                        </p>
                        
                    </td>
                    <td colspan="1"><h5>Number of Peices:</h5> <p> {{ $numberOfPieces }} </p></td>
                    <td colspan="1"><h5>Total Weight:</h5> <p> {{ $totalWeight }} KG </p></td>
                   
                </tr>
                <tr>
                    <td colspan="2">
                        <h5>Company Address</h5>
                        <p>F-16 Shadman Mall,Main Shadman market Lahore</p>
                    </td>
                    <td colspan="2">
                        <h5>Company Phone #</h5>
                        <p>03218311850/03454243491</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h5>Shipper Aggreement</h5>
                        <p>SHIPPER'S AGREEMENT : UNLESS OTHERWISE AGREED IN WRITING .I/WE AGREE THE CARRIER'S TERMS AND CONDITION ARE ALL THE TERMS OF THE 													
CONTACT BETWEEN ME/US AND CARRIER AND (1) SUCH TERMS & CONDITION AND WHERE APPLICABLE.THE WARSAW CONVENTION LIMITS AND /OR 													
EXCLUDES CARRIER'S LIABILITY FOR LOSS DEMAGE OR DELAY AND (2) THIS SHIPMENT DOES NOT CONTAIN CASH OR DANGEROUS GOOD. 													
NOTE; CLAIM WILL BE ENTERTAINED ACCORDING TO THE PROVIDED INVOICE VALUE.IF LESS THEN US $ 100 OR US $ 100 													
MAXIMUM INSURANCE IS COMPULSORY FROM THE SHIPPER SIDE. IF THE SHIPMENT VALUE IS MORE THAN US $ 100  							   						
OTHERWISE J&K IS NOT RESPONSIBLE FOR ANY LOSS OR DAMAGE OF GOODS </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h5>SHIPPER SIGN</h5>
                        <p></p>
                    </td>
                    <td colspan="2">
                        <h5>THUMB IMPRESSION</h5>
                        <p></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>

        
    </div>

    <script src="{{asset('/assets/back-end')}}/js/popper.js"></script>
    <script src="{{asset('/assets/back-end')}}/js/bootstrap.min.js"></script>
  </body>
</html>