<div class="form-group">
    <label for="">rw</label>
    <input type="text" value="{{ $rw->rw }}" name="rw" class="form-control @error('rw') is-invalid @enderror">
    @error('rw')
    <span class="invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="">ketua rw id</label>
    <select class="form-control @error('ketua_rw_id') is-invalid @enderror" name="ketua_rw_id" id="">
        @foreach ($wargas as $warga)
        <option @if($rw->ketua_rw_id == $warga->id) selected @endif value="{{ $warga->id }}">{{ $warga->nama_warga }}</option>
        @endforeach
    </select>
    @error('ketua_rw_id')
    <span class="invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>