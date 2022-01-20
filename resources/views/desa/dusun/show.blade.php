@extends('layouts.app')
@section('title', 'Dusun Show')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('desa.dusun.index') }}">Dusun</a></li>
<li class="breadcrumb-item active">Show</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        </div>
    </div>
</div>
@stop