@extends('layouts.app')
@section('title', 'Produk List')
@push('bread')
<li class="breadcrumb-item active">Produk</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info"><i class="fas fa-long-arrow-alt-left"></i> <span>Back</span></a>
                <a href="{{ route('desa.produk.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> <span>add</span></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>nama produk</th>
                                <th>harga</th>
                                <th>deskripsi</th>
                                <th>warga</th>
                                <th>desa</th>
                                <th>thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $data->nama_produk}}</th>
                                <th>{{ number_format($data->harga)}}</th>
                                <th>{{ $data->deskripsi}}</th>
                                <th>{{ $data->warga->nama_warga }}</th>
                                <th>{{ $data->desa->nama_desa }}</th>
                                <td>
                                    <ul class="list-group list-group-horizontal-md">
                                        @foreach($data->photo as $row)
                                        <li class="list-group-item">
                                            <img src="{{ asset('/storage/'.$row->photo) }}" width="50" heith="50" alt="">
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('desa.produk.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('desa.produk.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger delete_confirm" type="submit"><i class="fas fa-trash"></i> Delete</button>
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
</div>
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