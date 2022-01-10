@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container pb-4 pt-4">
    <div class="row">
        <div class="col-md-12">

            <div class="card shadow p-4">
                <div class="card-body">
                    <h3 class="card-title pb-2">Dokumen Desa {{ getDesaFromUrl()->nama_desa }}</h3>
                    <table class="table table-borderless border table-hover text-center">
                        <thead class="bg-dark text-light">
                            <tr>
                                <td>Upload</td>
                                <th>Dokumen</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dokumens as $dokumen)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($dokumen->created_at)->diffForHumans() }}</td>
                                <td>{{ number_format(Storage::size($dokumen->path) / 1048576,2) }} MB / ({{ File::extension($dokumen->path) }})</td>
                                <td class="text-center"><a href="{{ asset('storage/'.$dokumen->path) }}" class="btn btn-lg btn-primary">download</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('landing.script')
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.7.7/dist/index.bundle.min.js"></script>
@endpush