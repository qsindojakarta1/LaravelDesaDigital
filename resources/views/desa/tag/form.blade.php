<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" id="name" value="{{ $tag->name ?? old('name') }}" class="form-control @error('name') is-invalid  @enderror">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>