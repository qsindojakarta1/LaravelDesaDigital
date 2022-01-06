<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" value="{{ $slider->photo ?? old('photo') }}" name="photo" id="photo" class="form-control @error('photo') is-invalid  @enderror">
            @error('photo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="link" class="form-label">Link</label>
            <input type="text" value="{{ $slider->link ?? old('link') }}" name="link" id="link" class="form-control @error('link') is-invalid  @enderror">
            @error('link')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="teks" class="form-label">Teks</label>
            <input type="text" value="{{ $slider->teks ?? old('teks') }}" name="teks" id="teks" class="form-control @error('teks') is-invalid  @enderror">
            @error('teks')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>