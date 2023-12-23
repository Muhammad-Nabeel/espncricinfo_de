@extends('layouts.back-end.app')

@section('title', 'Update Shipment')

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

<h2 style="font-weight:600;">Update Shipment</h2>
<div class="container">
    <table class="table table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col">Consignee #</th>
                <th scope="col">PO #</th>
                <th scope="col">Created On</th>
                <th scope="col">Service</th>
                <th scope="col">Consignee</th>
                <th scope="col">Status</th>
                <th scope="col">History</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
            <tr>
                <th scope="row">{{ $shipment['consignment_number'] }}</th>
                <td>{{ $shipment['purchase_order_number'] }}</td>
                <td>{{ \Carbon\Carbon::parse($shipment['created_at'])->format('Y-m-d H:i:s') }}</td>
                <td>{{ $shipment['country'] }}</td>
                <td>
                @if(isset($shipment['deliveryAddress']->consignor))
                    {{ $shipment['deliveryAddress']->consignor }}
                @else
                    N/A
                @endif
                </td> {{-- Replace with actual consignee information --}}
                <td>
                    @if(isset($shipment->trackingEvents[0]->event))
                        <?php $lastTrackingEvent = $shipment->trackingEvents->last(); ?>
                        <span>{{ $lastTrackingEvent->event }}</span>
                    @else
                        N/A
                    @endif
                    <span class="fa fa-edit mr-3 d-inline" onclick="customtrackEvent('{{ $shipment['id'] }}')"></span>
                </td>
                <td>
                <button type="button" class="btn btn-primary" onclick="trackStatus('{{ $shipment['id'] }}')">View</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
        <script>
            // Your script content here
            function trackStatus(id) {
                // Get values from the form
                const consignmentNumber = "0";
                $("#loading").removeClass("d--none");
                // Create the fetch request
                fetch('{{ route('admin.track-status') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include CSRF token if applicable
                    },
                    body: JSON.stringify({
                        id: id,
                        consignment_number: consignmentNumber
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response data here
                    $("#exampleModalLabel").html("Shipment Tracking & Parcel Info");
                    $(".modal-body").html(data.trackingView);
                    $("#loading").addClass("d--none");
                    $("#exampleModal").modal('show');
                })
                .catch(error => {
                    // Handle errors here
                    toastr.error('Error:'+ error);
                });
            }

            function customtrackEvent(shipmentid){
                $("#exampleModalLabel").html("Change Tracking Status");
                $("#loading").removeClass("d--none");
                $(".modal-body").html("");
                // Create the fetch request
                fetch(`{{ route('admin.get_trackstatus_fields') }}?shipment_id=${shipmentid}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include CSRF token if applicable
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response data here
                    $("#exampleModal").modal('show');
                    $(".modal-body").html(data.trackstatusInputsView);
                    $("#loading").addClass("d--none");
                    
                    $("#exampleModal").modal('show');
                })
                .catch(error => {
                    // Handle errors here
                    toastr.error('Error:'+ error);
                });
            }

            function changeTrackingStatus(id,current){
                var newstatus = $(current).val();
                fetch('{{ route('admin.change-track-status') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include CSRF token if applicable
                    },
                    body: JSON.stringify({
                        id: id,
                        status: newstatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response data here
                    toastr.success(data.success);
                })
                .catch(error => {
                    // Handle errors here
                    toastr.error('Error:'+ error);
                });
            }
        </script>
   
@endsection

