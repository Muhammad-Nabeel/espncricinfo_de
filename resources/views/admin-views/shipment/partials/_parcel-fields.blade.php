<div class="parcel-row">
    <div class="form-row">
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][tracking_number]" placeholder="Tracking #">
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][parcel_details]" placeholder="Details">
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][pieces]" placeholder="Pieces">
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][weight]" placeholder="Weight">
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][length]" placeholder="Length">
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][width]" placeholder="Width">
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][height]" placeholder="Height">
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="parcels[{{ $index }}][price]" placeholder="Price">
        </div>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-danger remove-row" onclick="removeRow(this)">Remove</button>
        </div>
    </div>
</div>

<script>
    function removeRow(current) {
        $(current).closest('.parcel-row').remove();
    }
</script>
