@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <div class="site-title text-center mb-60">
                <span class="sub-title">Informasi desa {{ $desa->nama_desa }}</span>
                <h2 class="mb-4">Pencarian " {{ $search }} "</h2>
                <form method="post" class="d-flex" action="{{ route('search') }}">
                    @csrf
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <button class="btn btn-lg btn-primary"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="blog-wpr grid-3">
        @foreach($informasis as $data)
        <div class="blog-box">
            <div class="blog-pic">
                <a href="{{ route('informasi.show',$data->id) }}">
                    <img src="{{ asset('storage/'.$data->thumbnail) }}" alt="thumb">
                </a>
            </div>
            <div class="blog-info">
                <ul class="blog-meta">
                    <li><a href="#"><i class="ti-user"></i> {{ $data->kategori_informasi->nama }}</a></li>
                    <li><i class="ti-comment"></i> 02</li>
                    <li><i class="ti-heart"></i> 06</li>
                </ul>
                <div class="d-flex justify-content-start">
                    <strong class="text-secondary">{{ $data->judul }}</strong>
                </div>
                <h4>
                    <a href="{{ route('informasi.show',$data->id) }}">
                        {{ Str::limit($data->deskripsi,50,'...') }}
                    </a>
                </h4>
                <div class="blog-date-more">
                    <small class="text-muted">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</small>
                    <a href="{{ route('informasi.show',$data->id) }}" class="btn-3"><small>Read More</small></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop