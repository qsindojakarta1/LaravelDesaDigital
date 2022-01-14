@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container">
    <div class="text-center py-4">
        <span class="sub-title">Produk Warga desa {{ $desa->nama_desa }}</span>
        <hr class="border">
    </div>
    <div class="row">
        @foreach($produks as $produk)
        <div class="col-md-4 mb-4" key="{{ $loop->iteration }}">
            <div class="card shadow">
                <img class="card-img-top" width="100" src="{{ asset('storage/'.$produk->photo()->first()->photo) }}" alt="">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>{{ \Str::limit($produk->nama_produk,20,'...') }}</h3>
                        <small>{{ $produk->warga->nama_warga }}</small>
                    </div>
                    <h5 class="text-secondary text-end">RP{{ number_format($produk->harga) }}</h5>
                    <small class="py-2">
                        {{ Str::limit($produk->deskripsi,50,'...') }}
                    </small>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-lg btn-outline-danger" data-key="{{ $produk->id }}" data-toggle="modal" data-target="#exampleModalCenter">
                            detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $produks->links() }}
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="card-img-top" id="img_produk" width="100" src="" alt="">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 id="nama_produk"></h3>
                        <small id="nama_warga_produk"></small>
                    </div>
                    <h5 id="harga_produk" class="text-secondary text-end"></h5>
                    <small id="deskripsi_produk" class="py-2">
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop
@push('landing.script')
<script>
    $('.btn').click(function() {
        $('#exampleModalCenter').modal('show')
        let id = $(this).attr('data-key')
        $.ajax({
            url: `/api/produk/desa/${id}`,
            success: res => {
                $('#img_produk').attr('src', res.photo[0].photo)
                $('#nama_warga_produk').html(res.warga.nama_warga)
                $('#nama_produk').html(res.nama_produk)
                $('#harga_produk').html(res.harga.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }))
                $('#deskripsi_produk').html(res.deskripsi)
            },
            error: err => {
                console.log(err.statusText)
            }
        })
    });
    $('#close').click(function() {
        $('#exampleModalCenter').modal('hide')
    })
</script>
@endpush