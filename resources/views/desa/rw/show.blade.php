@extends('layouts.app')
@section('title', 'rw Show')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('desa.rt.index') }}">rw</a></li>
<li class="breadcrumb-item active">Show</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>rt</th>
                                <th>ketua rt</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rts as $rt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rt->rt }}</td>
                                <td>{{ $rt->ketua_rt->nama_warga }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('desa.rt.edit',$rt->id) }}">edit</a>
                                        <form action="{{ route('desa.rt.destroy',$rt->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger">delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div>
                    <form action="{{ route('desa.rt.store') }}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="rw_id" value="{{ $rw->id }}">
                        <div class="form-group">
                            <label for="">rt</label>
                            <input type="text" name="rt"
                                class="form-control @error('rt') is-invalid @enderror">
                            @error('rt')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ketua rt id</label>
                            <select class="form-control @error('ketua_rt_id') is-invalid @enderror"
                             name="ketua_rt_id" id="">
                                @foreach ($wargas as $warga)
                                <option value="{{ $warga->id }}">{{ $warga->nama_warga }}</option>
                                @endforeach
                            </select>
                            @error('ketua_rt_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-secondary">store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop