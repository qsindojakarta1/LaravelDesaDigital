@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container py-4">
    <h3 class="text-center">
        {{ $informasi->judul }}
    </h3>
    <br>
    <div class="d-flex justify-content-center">
        <img class="img-fluid align-center" src="{{ asset('storage/'.$informasi->thumbnail) }}" alt="">
    </div>
    <br>
    <div class="d-flex justify-content-center">
        {{ $informasi->deskripsi }}
    </div>
</div>
@stop