<div class="card" id="shipmentTrack" data-shipid="{{ $trackingEvents[0]['shipment_id'] }}">
    <div class="card-body">
        <h6 class="card-title">Timeline</h6>
        <div id="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trackingEvents as $event)
                        <tr>
                            <td>{{ $event['event'] }}</td>
                            <td>{{ Carbon\Carbon::parse($event['created_at'])->format('F d, Y h:i A') }}</td>
                            <td>
                                @if($event['event'] == 'shipped')
                                    <?php
                                    $pickupAddress = App\Models\PickupAddress::select('consignor', 'address_line_1', 'address_line_2', 'country')
                                        ->where('shipment_id', $event['shipment_id'])
                                        ->first();
                                    ?>
                                    {{ $pickupAddress->consignor }}, {{ $pickupAddress->address_line_1 }}, {{ $pickupAddress->address_line_2 }}, {{ $pickupAddress->country }}
                                @elseif($event['event'] == 'delivered')
                                    <?php
                                    $deliveryAddress = App\Models\DeliveryAddress::select('consignor', 'address_line_1', 'address_line_2', 'country')
                                        ->where('shipment_id', $event['shipment_id'])
                                        ->first();
                                    ?>
                                    {{ $deliveryAddress->consignor }}, {{ $deliveryAddress->address_line_1 }}, {{ $deliveryAddress->address_line_2 }}, {{ $deliveryAddress->country }}
                                @else
                                    {{ $event['location'] }}
                                @endif
                            </td>
                            <td>{{ $event['notes'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
