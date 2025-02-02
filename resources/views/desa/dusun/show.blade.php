@extends('layouts.app')
@section('title', 'Dusun Show')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('desa.dusun.index') }}">Dusun</a></li>
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
                                <th>rw</th>
                                <th>ketua rw</th>
                                <th>rt</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rws as $rw)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rw->rw }}</td>
                                <td>{{ $rw->ketua_rw->nama_warga }}</td>
                                <td>{{ $rw->rt->count() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('desa.rw.show',$rw->id) }}">show</a>
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('desa.rw.edit',$rw->id) }}">edit</a>
                                        <form action="{{ route('desa.rw.destroy',$rw->id) }}" method="post">
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
                    <form action="{{ route('desa.rw.store') }}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="dusun_id" value="{{ $dusun->id }}">
                        <div class="form-group">
                            <label for="">rw</label>
                            <input type="text" name="rw"
                                class="form-control @error('rw') is-invalid @enderror">
                            @error('rw')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ketua rw id</label>
                            <select class="form-control @error('ketua_rw_id') is-invalid @enderror"
                             name="ketua_rw_id" id="">
                                @foreach ($wargas as $warga)
                                <option value="{{ $warga->id }}">{{ $warga->nama_warga }}</option>
                                @endforeach
                            </select>
                            @error('ketua_rw_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop