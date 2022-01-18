@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <h3 class="text-center">
                {{ $informasi->judul }}
            </h3>
            <div class="d-flex justify-content-center">
                <img class="img-fluid align-center" src="{{ asset('storage/'.$informasi->thumbnail) }}" alt="">
            </div>
            <div class="d-flex justify-content-center py-4">
                {{ $informasi->deskripsi }}
            </div>
        </div>
        <div class="col-md-4">
            <aside class="sidebar">
                <!--Search-->
                <div class="sidebar-widget search">
                    <form method="post" action="{{ route('search') }}">
                        @csrf
                        <input type="text" name="search" placeholder="Search">
                        <button class="sub-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <!--Categories-->
                <div class="sidebar-widget cate">
                    <h4 class="widget-title">kategori</h4>
                    <ul>
                        @forelse(App\Models\KategoriInformasi::where('desa_id',getDesaFromUrl()->id)->latest()->get() as $data)
                        <li>
                            <a href="{{ route('kategori',$data->id) }}">
                                {{ $data->nama }}
                                <span>{{ $data->informasis->count() }}</span>
                            </a>
                        </li>
                        @empty
                        <li>
                            <a href="">
                                tidak ada kategori informasi
                            </a>
                        </li>
                        @endforelse
                    </ul>
                </div>
                <!--Recent Post-->
                <div class="sidebar-widget recent-post">
                    <h4 class="widget-title">informasi terbaru</h4>
                    <div class="recent-post-content">
                        @foreach(App\Models\Informasi::where('desa_id',getDesaFromUrl()->id)->latest()->get() as $data)
                        <div class="recent-post-single">
                            <div class="recent-post-img">
                                <a href="{{ route('informasi.show',$data->id) }}">
                                    <img src="{{ asset('storage/'.$data->thumbnail) }}" alt="thumb">
                                </a>
                            </div>
                            <div class="recent-post-info">
                                <a href="{{ route('informasi.show',$data->id) }}">
                                    <span>{{ Carbon\Carbon::parse($data->created_at)->format('d F Y') }}</span>
                                    <h5>{{ \Str::limit($data->judul,20,'...') }}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@stop