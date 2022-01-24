<div class="text-capitalize">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" value="{{ $warga->nik ?? old('nik') }}"
                    class="form-control @error('nik') is-invalid @enderror">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="kk" class="form-label">KK</label>
                <input type="text" name="kk" id="kk" value="{{ $warga->kk ?? old('kk') }}"
                    class="form-control @error('kk') is-invalid @enderror">
                @error('kk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="nama_warga" class="form-label">Nama</label>
                <input type="text" name="nama_warga" id="nama_warga"
                    value="{{ $warga->nama_warga ?? old('nama_warga') }}"
                    class="form-control @error('nama_warga') is-invalid @enderror">
                @error('nama_warga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                    value="{{ $warga->jenis_kelamin ?? old('jenis_kelamin') }}"
                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    @foreach(App\Models\Warga::getPossibleJenisKelamin() as $data)
                    <option @if($warga->jenis_kelamin ?? old('jenis_kelamin') == $data) selected @endif value="{{ $data
                        }}">{{ $data }}</option>
                    @endforeach
                </select>
                @error('jenis_kelamin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir"
                    value="{{ $warga->tempat_lahir ?? old('tempat_lahir') }}"
                    class="form-control @error('tempat_lahir') is-invalid @enderror">
                @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                    value="{{ $warga->tanggal_lahir ?? old('tanggal_lahir') }}"
                    class="form-control @error('tanggal_lahir') is-invalid @enderror">
                @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="alamat">alamat</label>
                <textarea type="text" name="alamat" id="alamat" class="form-control">{{ $warga->alamat }}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="warga_negara">warga negara</label>
                <input type="text" name="warga_negara" id="warga_negara" class="form-control"
                    value="{{ $warga->warga_negara }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="agama_id" class="form-label">Agama</label>
                <select name="agama_id" id="agama_id" class="form-control @error('agama_id') is-invalid @enderror">
                    @foreach(\App\Models\Agama::get() as $data)
                    <option @if($warga->agama_id == $data->id) selected @endif value="{{ $data->id }}">{{ $data->nama }}
                    </option>
                    @endforeach
                </select>
                @error('agama_id')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="pekerjaan_id">pekerjaan</label>
                <select name="pekerjaan_id" id="pekerjaan_id"
                    class="form-control @error('pekerjaan_id') is-invalid @enderror">
                    @foreach(\App\Models\Pekerjaan::get() as $data)
                    <option @if($warga->pekerjaan_id == $data->id) selected @endif value="{{ $data->id }}">{{
                        $data->nama }}</option>
                    @endforeach
                </select>
                @error('pekerjaan_id')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="pendidikan_id">pendidikan</label>
                <select class="form-control @error('pendidikan_id') is-invalid @endif" id="pendidikan_id"
                    name="pendidikan_id">
                    @foreach(App\Models\Pendidikan::get() as $data)
                    <option @if($warga->pendidikan_id == $data->id) selected @endif value="{{ $data->id }}">{{
                        $data->nama }}</option>
                    @endforeach
                </select>
                @error('pendidikan_id')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="status_perkawinan_id">status perkawinan</label>
                <select name="status_perkawinan_id" id="status_perkawinan_id"
                    class="form-control @error('status_perkawinan_id') is-invalid @enderror">
                    @foreach(App\Models\StatusPerkawinan::get() as $data)
                    <option @if($warga->status_perkawinan_id == $data->id) selected @endif value="{{ $data->id }}">{{
                        $data->nama }}</option>
                    @endforeach
                </select>
                @error('status_perkawinan_id')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="golongan_darah_id">golongan darah</label>
                <select name="golongan_darah_id" id="golongan_darah_id"
                    class="form-control @error('golongan_id') is-invalid @enderror">
                    @foreach(App\Models\GolonganDarah::get() as $data)
                    <option @if($warga->golongan_darah_id == $data->id) selected @endif value="{{ $data->id }}">{{
                        $data->nama }}</option>
                    @endforeach
                </select>
                @error('golongan_darah_id')
                <span class="invalid-feedback">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="suku_id">suku</label>
                <select name="suku_id" id="suku_id" class="form-control @error('suku_id') is-invalid @enderror">
                    @foreach(App\Models\Suku::get() as $data)
                    <option @if($warga->suku_id == $data->id) selected @endif value="{{ $data->id }}">{{ $data->nama }}
                    </option>
                    @endforeach
                </select>
                @error('suku_id')
                <span class="invalid-feedback">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="desa_id" class="form-label">Desa</label>
                <select name="desa_id" id="desa_id" class="form-control @error('desa_id') is-invalid @enderror">
                    @foreach($desas as $desa)
                    <option @if($warga->desa_id ?? getDesaFromUrl()->id == $desa->id) selected @endif value="{{
                        $desa->id }}">{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>
                @error('desa_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="kecamatan" class="form-label">kecamatan</label>
                <input type="text" readonly class="form-control" id="kecamatan"
                    value="{{ $warga->desa->kecamatan->nama_kecamatan  ?? getDesaFromUrl()->kecamatan->nama_kecamatan }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label" for="kabupaten" class="form-label">kabupaten</label>
                <input type="text" readonly class="form-control" id="kabupaten"
                    value="{{ $warga->desa->kecamatan->kabupaten->nama_kabupaten ?? getDesaFromUrl()->kecamatan->kabupaten->nama_kabupaten }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="dusun_id" class="form-label">dusun</label>
                <select name="dusun_id" id="dusun_id" class="form-control">
                    <option value="">pilih dusun</option>
                    @foreach (App\Models\Dusun::where('desa_id',getDesaFromUrl()->id)->get() as $dusun)
                    <option @if($warga->dusun_id == $dusun->id) selected @endif value="{{ $dusun->id }}">{{ $dusun->nama_dusun }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="rw_id" class="form-label">rw</label>
                <select name="rw_id" id="rw_id" class="form-control">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="rt_id" class="form-label">rt</label>
                <select name="rt_id" id="rt_id" class="form-control">

                </select>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $('#dusun_id').change(function(){
        $('#rw_id').html('')
        $.ajax({
            url: `/api/dusun/${$(this).val()}`,
            method: 'get',
            success: res => {
                $('#rw_id').append(`<option value="">pilih rw</option>`)
                $.each(res,function(){
                    $('#rw_id').append(`<option value="${this.id}">${this.rw}</option>`)
                })
            },
            error: err => {
                console.log(err.statusText)
            }
        })
    })
    $('#rw_id').change(function(){
        $('#rt_id').html('')
        $.ajax({
            url: `/api/rw/${$(this).val()}`,
            method: 'get',
            success: res => {
                $('#rt_id').append(`<option value="">pilih rt</option>`)
                $.each(res,function(){
                    $('#rt_id').append(`<option value="${this.id}">${this.rt}</option>`)
                })
            },
            error: err => {
                console.log(err.statusText)
            }
        })
    })
    $('#desa_id').change(function() {
        console.log($(this).val())
        $('#kecamatan').val('')
        $('#kabupaten').val('')
        $.ajax({
            url: `/api/desa/${$(this).val()}`,
            method: 'get',
            success: function(res) {
                console.log(res)
                $('#kecamatan').val(res.kecamatan.nama_kecamatan)
                $('#kabupaten').val(res.kabupaten.nama_kabupaten)
            },
            error: function(err) {
                console.log(err.statusText)

            }
        })
    });
</script>
@endpush