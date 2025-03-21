@extends('layouts.default')
@section('content')

<section class="section">
    <div class="section-header">
        <h1> Ticket</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Ticket</h4>
                    <div class="card-header-action">
                    <a href="{{ route('ticket.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-striped mb-0" id="dataTable">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>                         
                        @foreach ($ticket as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->status->name }}</td>
                                {{-- <td>{{ $item->description }}</td> --}}
                                <td>
                                    <a href="{{ route('ticket.edit',$item->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('ticket.delete',$item->id) }}" 
                                    class="btn btn-danger btn-action mr-1" 
                                    data-toggle="tooltip" 
                                    title="Delete"
                                    onclick="return confirm('Are you sure? This action cannot be undone.')">
                                    <i class="fas fa-trash"></i>
                                    <a href="{{ route('ticket.detail',$item->id) }}" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>
                                    <a class="btn btn-success btn-action mr-1" data-toggle="tooltip" title="Pesan"><i class="fas fa-comments"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection