@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<!-- Start Slider
		============================================= -->
<div class="hero-section hero-slider owl-carousel owl-theme pb-4">
    @foreach($sliders as $data)
    <div class="hero-single swiper-slide" style="background-image: url('{{ asset('storage/'.$data->photo) }}')">
        <div class="container">
            <div class="hero-content">
                <span class="sub-title">Start to learning today</span>
                <h2 class="hero-title">
                    {{ $data->teks }}
                    <br />
                    <span>{{ $desa->nama_desa }} </span>
                </h2>
                <a href="{{ $data->link }}" target="_blank" class="btn-1">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- End Slider -->
<!-- Start Blog
		============================================= -->
<div class="blog-area de-pb pb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="site-title text-center mb-60">
                    <span class="sub-title">Tag {{ $tag->name }}</span>
                    <h2 class="mb-0">Page Berdasarkan {{ $tag->name }}</h2>
                </div>
            </div>
        </div>
        <div class="blog-wpr grid-3">
            @foreach($pages as $data)
            <div class="blog-box">
                <div class="blog-info">
                    <ul class="blog-meta">
                        <li><a href="#"><i class="ti-user"></i> {{ $data->tag->name }}</a></li>
                        <li><i class="ti-comment"></i> 02</li>
                        <li><i class="ti-heart"></i> 06</li>
                    </ul>
                    <div class="d-flex justify-content-start">
                        <strong class="text-secondary">{{ $data->judul }}</strong>
                    </div>
                    <h4>
                        <a href="{{ route('page.show',$data->id) }}">
                            {{ $data->judul  }}
                        </a>
                    </h4>
                    <div class="blog-date-more">
                        <small class="text-muted">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</small>
                        <a href="{{ route('page.show',$data->id) }}" class="btn-3"><small>Read More</small></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $pages->links() }}
        </div>
    </div>
</div>
<!-- End Blog -->
@stop