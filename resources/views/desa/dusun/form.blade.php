<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama_dusun" class="form-label">nama dusun</label>
            <input type="text" name="nama_dusun" id="nama_dusun" value="{{ $dusun->nama_dusun ?? old('nama_dusun') }}"
                class="form-control @error('nama_dusun') is-invalid  @enderror">
            @error('nama_dusun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <label for="" class="form-label">ketua dusun</label>
        <select id="select2" name="ketua_dusun_id"
            class="form-control select2-ajax-cetak-surat @error('ketua_dusun_id') is-invalid @enderror"></select>
        @error('ketua_dusun_id')
        <span class="invalid-feedback">
            {{ $message }}
        </span>
        @enderror
        <small class="text-sm text-info">
            {{ $dusun->ketua_dusun_id ? 'kosong kan jika tidak merubah ketua dusun' : 'pilih ketua dusun' }}
        </small>
    </div>
</div>