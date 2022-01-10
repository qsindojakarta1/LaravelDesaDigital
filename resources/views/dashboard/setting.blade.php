@extends('layouts.app')
@section('title', 'Setting')
@push('bread')
<li class="breadcrumb-item active">Setting</li>
@endpush
@section('content')
<form action="{{ route('setting.update', $desa->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pengaturan Desa</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $desa->dark_logo) }}" alt="" class="img-thumbnail border-0 wd-100 wd-sm-200">
                                </div>
                                <div class="col-md-8">
                                    <label for="">Dark Logo</label><br>
                                    <div class="form-group">
                                        <input type="file" name="dark_logo" id="dark_logo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $desa->light_logo) }}" alt="" class="img-thumbnail border-0 wd-100 wd-sm-200">
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Light Logo</label><br>
                                        <input type="file" name="light_logo" id="light_logo" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ $desa->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 py-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Header</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email" class="form-label">email</label>
                        <input type="email" name="email" id="email" placeholder="john@email.com" class="form-control @error('email') is-invalid @enderror" value="{{ $desa->header->email ?? old('email') }}">
                        @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color" class="form-label">color</label>
                        <input type="color" name="color" id="color" class="form-control @error('color') is-invalid @enderror" value="{{ $desa->header->color ?? old('color') }}">
                        @error('color')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 py-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Footer</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="tentang" class="form-label">tentang</label>
                        <textarea type="text" name="tentang" id="tentang" class="form-control @error('tentang') is-invalid @enderror">{{ $desa->footer->tentang ?? old('tentang') }}</textarea>
                        @error('tentang')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="form-label">telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ $desa->footer->telepon ?? old('telepon') }}">
                        @error('telepon')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary btn-block">submit</button>
    </div>
</form>
@stop
@push('script')
<script>
    $('#datatable').DataTable()
    $('.delete_confirm').click(function(event) {
        let form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    form.submit();
                }
            });
    });
</script>
@endpush