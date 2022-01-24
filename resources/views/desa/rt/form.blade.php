<div class="form-group">
    <label for="">rt</label>
    <input type="text" value="{{ $rt->rt }}" name="rt" class="form-control @error('rt') is-invalid @enderror">
    @error('rt')
    <span class="invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="">ketua rt id</label>
    <select class="form-control @error('ketua_rt_id') is-invalid @enderror" name="ketua_rt_id" id="">
        @foreach ($wargas as $warga)
        <option @if($rt->ketua_rt_id == $warga->id) selected @endif value="{{ $warga->id }}">{{ $warga->nama_warga }}</option>
        @endforeach
    </select>
    @error('ketua_rt_id')
    <span class="invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>