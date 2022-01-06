@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<!-- Start Slider
		============================================= -->
<div class="hero-section hero-slider owl-carousel owl-theme pb-4">
    @foreach(\App\Models\Slider::where('desa_id',$desa->id)->get() as $data)
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
<div class="d-flex justify-content-center">
    <h1>Sejarah</h1>
</div>
@stop