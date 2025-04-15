@extends('layouts.default')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Unit Kerja</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Unit Kerja</h4>
                    <div class="card-header-action">
                    <a href="{{ route('unit_kerja.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-striped mb-0" id="unitKerja">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>                         
                        @foreach ($unit_kerja as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ route('unit_kerja.edit',$item->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('unit_kerja.delete',$item->id) }}" 
                                    class="btn btn-danger btn-action mr-1" 
                                    data-toggle="tooltip" 
                                    title="Delete"
                                    onclick="return confirm('Are you sure? This action cannot be undone.')">
                                    <i class="fas fa-trash"></i>
                                    <a class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables JS -->
<script>
    $(document).ready(function () {
    $('#unitKerja').DataTable(); // tanpa serverSide
});
</script>

@endsection