<form id="trackStatusForm" method="POST" action="{{ route('admin.change-track-status') }}">
    @csrf
    <div class="form-group d-none">
        <label for="id">Shipment ID</label>
        <input type="text" class="form-control" id="id" name="shipment_id" value="{{ $shipment_id }}" readonly>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control d-inline">
            <option value="pending" >Pending</option>
            <option value="booked" >Booked</option>
            <option value="shipped" >Shipped</option>
            <option value="Hold">Hold</option>
            <option value="delivered" >Delivered</option>
            <option value="Label has been generated" >Label has been generated</option>
            <option value="Shipment Pickup">Shipment Pickup</option>
            <option value="Shipment Processed" >Shipment Processed</option>
            <option value="Tracking Number Updated">Tracking Number Updated</option>
            <option value="Shipment Manifested" >Shipment Manifested</option>
            <option value="Shipment Departed" >Shipment Departed</option>
            <option value="Shipment Arrived" >Shipment Arrived</option>
            <option value="In Custom Clearance">In Custom Clearance</option>
            <option value="Cleared From Custom" >Cleared From Custom</option>
            <option value="Hand Over to DHL">Hand Over to DHL</option>
            <option value="Hand Over to UPS" >Hand Over to UPS</option>
            <option value="Hand Over to FedEx" >Hand Over to FedEx</option>
            <option value="Hand Over to Courier">Hand Over to Courier</option>
        </select>
    </div>

    <div class="form-group">
        <label for="event_date">Event Date</label>
        <input type="text" class="form-control" id="event_date" name="event_date" value="{{ now() }}" readonly>
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <select class="form-control" style="width: 100%;" name="location">
            @foreach(config('countries') as $country)
                <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea class="form-control" id="notes" name="notes"></textarea>
    </div>
    <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
</form>


<script>

    function submitForm() {
        // Serialize form data
        var formData = $('#trackStatusForm').serialize();
        $("#loading").removeClass("d--none");
        // Send AJAX request
        $.ajax({
            url: "{{ route('admin.change-track-status') }}",
            type: "POST",
            data: formData,
            success: function(data) {
                // Handle success response
                 // Handle the response data here
                 toastr.success(data.success);
                 $("#loading").addClass("d--none");
                 location.reload();
            },
            error: function(error) {
                // Handle errors here
                toastr.error('Error:'+ JSON.stringify(error));
            }
        });
    }
</script>