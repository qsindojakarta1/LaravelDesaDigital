@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container pb-4 pt-4">
    <div class="d-flex justify-content-center">
        <h1>Galeri</h1>
    </div>
    <div class="row">
        @foreach($galleries as $data)
        <a href="{{ asset('storage/'.$data->photo) }}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-3 pb-4">
            <img src="{{ asset('storage/'.$data->photo) }}" class="img-fluid">
        </a>
        @endforeach
    </div>
</div>
@stop
@push('landing.script')
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.7.7/dist/index.bundle.min.js"></script>
@endpush