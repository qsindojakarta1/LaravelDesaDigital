@extends('layouts.landing', ['title' => $title])

@section('content')
<div class="py-4">

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Form Aduan</h5>
                        <form action="{{ route('aduan.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="nik">Nik</label>
                                <input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror">
                                @error('nik')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="aduan">Aduan</label>
                                <textarea name="aduan" id="aduan" rows="5" class="form-control @error('aduan') is-invalid @enderror"></textarea>
                                @error('aduan')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group py-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop