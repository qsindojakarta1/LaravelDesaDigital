@extends('layouts.app')
@section('title', 'Cetak Surat Edit')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('desa.permohonan.index') }}">Cetak Surat</a></li>
<li class="breadcrumb-item active">Edit</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('desa.permohonan.index') }} " class="btn btn-sm btn-outline-info"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('desa.cetak_surat.update',$surat->id) }}" method="post" id="form">
                    @csrf
                    @method('put')
                    <input type="hidden" name="warga_id" id="warga_id" value="{{ $warga->id }}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="" class="form-label">Nik</label>
                            <input type="text" name="warga" readonly class="form-control" value="{{ $warga->nama_warga }} - {{ $warga->nik }}">
                        </div>
                    </div>
                    <div class="form-group row" id="warga">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="umur" id="umur" readonly>
                        </div>
                    </div>
                    <div>
                        @include('desa.cetak_surat.form')
                    </div>
                </form>

            </div>
            <div class="card-footer d-flex flex-row justify-content-end">
                <button class="btn btn-sm btn-outline-success" id="store"><i class="fas fa-cloud-upload-alt"></i> Store</button>
            </div>
        </div>
    </div>
</div>
@stop
@push('script')
<script>
    $(document).ready(function() {

        let id = $('#warga_id').val()
        console.log(id)
        $.ajax({
            url: `/api/select2/cetaksurat/${id}`,
            success: data => {
                console.log(data)
                $('#tempat_lahir').val(data.resource.tempat_lahir)
                $('#tanggal_lahir').val(data.resource.tanggal_lahir)
                $('#umur').val(data.umur)
            },
            error: error => {
                console.log(error)
            }
        })
    })
    $('#store').on('click', function() {
        $('#form').submit()
    });
</script>
@endpush