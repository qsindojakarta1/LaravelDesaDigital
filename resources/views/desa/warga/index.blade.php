@extends('layouts.app')
@section('title', 'Masyarakat List')
@push('bread')
<li class="breadcrumb-item active">Masyarakat</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-info"><i class="fas fa-long-arrow-alt-left"></i> <span>Back</span></a>
                <a href="{{ route('desa.warga.create') }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> <span>add</span></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>desa</th>
                                <th>kecamatan</th>
                                <th>kabupaten</th>
                                <th>nik</th>
                                <th>nama_warga</th>
                                <th>jenis_kelamin</th>
                                <th>tempat lahir</th>
                                <th>tanggal lahir</th>
                                <th>di daftarkan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wargas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->desa->nama_desa }}</td>
                                <td>{{ $data->desa->kecamatan->nama_kecamatan }}</td>
                                <td>{{ $data->desa->kecamatan->kabupaten->nama_kabupaten }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama_warga }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tempat_lahir }}</td>
                                <td>{{ $data->tanggal_lahir }}</td>
                                <td>{{ $data->is_nik ?? 'Kosong' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('desa.warga.edit', $data->id) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('desa.warga.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-danger delete_confirm" type="submit"><i class="fas fa-trash"></i> Delete</button>
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