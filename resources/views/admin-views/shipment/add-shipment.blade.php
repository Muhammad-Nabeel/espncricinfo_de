@extends('layouts.back-end.app')
@section('title', 'Add Shipment')

@section('content')
    <h2 style="font-weight:600;">Booking</h2>

    <div class="container">

        <form action="{{ route('admin.add_shipment') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Country </label>
                    <select id="mySelect" class="form-control" style="width: 100%;" name="ship_country">
                        @foreach(config('countries') as $country)
                            <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                @php
                    // Default value
                    $defaultValue = '44444502';

                    // Count total number of records in the shipments table
                    $totalCount = App\Models\Shipment::count();

                    // Generate the consignment number
                    $consignmentNumber = $defaultValue + $totalCount + 1;
                @endphp

                <div class="form-group col-md-3">
                    <label for="consignmentNumber">Consignment Number</label>
                    <input type="text" class="form-control" id="consignmentNumber" name="consignment_number" value="{{ $consignmentNumber }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="purchaseOrderNumber">Purchase Order Number</label>
                    <input type="text" class="form-control" id="purchaseOrderNumber" name="purchase_order_number">
                </div>
                <div class="form-group col-md-3">
                    <label for="ref2">Service</label>
                    <input type="text" class="form-control" id="ref2" name="ref2">
                </div>
                <div class="form-group col-md-3">
                    <label for="thirdPartyEmail">Third Party Email</label>
                    <input type="email" class="form-control" id="thirdPartyEmail" name="third_party_email">
                </div>
                <div class="form-group col-md-3">
                    <label for="notificationEmail">Notification Email</label>
                    <input type="email" class="form-control" id="notificationEmail" name="notification_email">
                </div>
                <div class="form-group col-md-3">
                    <label for="notificationEmail">Invoice Type:</label>
                    <select id="myinvoice" class="form-control" style="width: 100%;" name="invoice_type">
                        <option value="Gift">Gift</option>
                        <option value="Sample">Sample</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="servicecharges">Service Charges</label>
                    <input type="text" class="form-control" id="servicecharges" name="service_charges">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card bg-white">
                        <div class="card-header bg-white">
                            <h5 class="text-dark m-0"> Shipper Address </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="p_consignor">Shipper</label>
                                <input type="text" class="form-control" id="consignor" name="p_consignor">
                            </div>

                            <div class="form-group">
                                <label for="p_cnic">CNIC</label>
                                <input type="text" class="form-control" id="cnic" name="p_cnic">
                            </div>

                            <div class="form-group">
                                <label for="p_companyname">Company Name</label>
                                <input type="text" class="form-control" id="companyname" name="p_companyname">
                            </div>

                            <div class="form-group">
                                <label for="p_address_line_1">Address Line 1</label>
                                <input type="text" class="form-control" id="p_address_line_1" name="p_address_line_1">
                            </div>

                            <div class="form-group">
                                <label for="p_address_line_2">Address Line 2</label>
                                <input type="text" class="form-control" id="p_address_line_2" name="p_address_line_2">
                            </div>

                            <div class="form-group">
                                <label for="town">Town</label>
                                <input type="text" class="form-control" id="town" name="p_town">
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="p_country">
                            </div>

                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="p_postal_code">
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="p_contact">
                            </div>

                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="p_telephone">
                            </div>

                            <div class="form-group">
                                <label for="consignee_email">Consignee Email</label>
                                <input type="email" class="form-control" id="consignee_email" name="p_consignee_email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-white">
                        <div class="card-header bg-white">
                            <h5 class="text-dark m-0"> Delivery Address </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="consignor">Consignor</label>
                                <input type="text" class="form-control" id="consignor" name="consignor">
                            </div>

                            <div class="form-group">
                                <label for="address_line_1">Address Line 1</label>
                                <input type="text" class="form-control" id="address_line_1" name="address_line_1">
                            </div>

                            <div class="form-group">
                                <label for="address_line_2">Address Line 2</label>
                                <input type="text" class="form-control" id="address_line_2" name="address_line_2">
                            </div>

                            <div class="form-group">
                                <label for="town">Town</label>
                                <input type="text" class="form-control" id="town" name="town">
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country">
                            </div>

                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code">
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact">
                            </div>

                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone">
                            </div>

                            <div class="form-group">
                                <label for="consignee_email">Consignee Email</label>
                                <input type="email" class="form-control" id="consignee_email" name="consignee_email">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <!-- Parcel fields -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title text-dark m-0">Parcel Information</h5>
                        </div>
                        <div class="card-body">
                            <div id="parcel-container">
                                @include('admin-views.shipment.partials._parcel-fields', ['index' => 0])
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary float-right" id="add-row" onclick="addRow()">
                                Add Row
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-success px-3">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<script>
    function addRow() {

        var parcelLen = $("#parcel-container .parcel-row").length + 1;

        $.get('/admin/get-parcel-fields/'+ parcelLen, function (data) {
            $("#parcel-container").append(data.parcelFields);
        });
    }
</script>
