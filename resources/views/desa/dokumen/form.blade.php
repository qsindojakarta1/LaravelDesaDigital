<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="path">files</label>
            <input type="file" name="path[]" multiple id="path" class="form-control @error('path') is-invalid @enderror">
            @error('path')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>