@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <h3 class="text-center text-danger">
                {{ $page->judul }}
            </h3>
            {!! $page->content !!}
        </div>

        <div class="col-md-4">
            <aside class="sidebar">
                <!--Categories-->
                <div class="sidebar-widget cate">
                    <h4 class="widget-title">laman lainnya</h4>
                    <ul>
                        @forelse(App\Models\Page::where('desa_id',getDesaFromUrl()->id)->latest()->get() as
                        $data)
                        <li>
                            <a href="{{ route('page.show',$data->id) }}">
                                {{ $data->judul }}
                                <span>{{ $data->tag->name }}</span>
                            </a>
                        </li>
                        @empty
                        <li>
                            <a href="">
                                tidak ada page informasi
                            </a>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>
@stop