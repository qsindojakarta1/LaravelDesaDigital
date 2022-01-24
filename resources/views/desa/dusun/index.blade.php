@extends('layouts.app')
@section('title', 'Dusun List')
@push('bread')
<li class="breadcrumb-item active">Dusun</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-info"><i class="fas fa-long-arrow-alt-left"></i> <span>Back</span></a>
                <a href="{{ route('desa.dusun.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> <span>add</span></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>nama dusun</th>
                                <th>ketua dusun</th>
                                <th>rw</th>
                                <th>rt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dusuns as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_dusun }}</td>
                                <th>{{ $data->ketua_dusun->nama_warga }}</th>
                                <th>
                                    {{ $data->rw->count() }}
                                </th>
                                <th>
                                    @php $me = 0 @endphp
                                    @foreach ($data->rw as $rw)
                                        @php $me += $rw->rt->count() @endphp
                                    @endforeach
                                    {{ $me }}
                                </th>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('desa.dusun.show',$data->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Show</a>
                                        <a href="{{ route('desa.dusun.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('desa.dusun.destroy', $data->id) }}" method="post">
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