@extends('layouts.default')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Kategori Topic</h4>
            <div class="card-header-action">
              <a href="{{ route('topic.tambah') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Deskrisi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>                         
                    @foreach ($topic_master as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description ?? '-' }}</td>
                            <td>
                                <a href="{{ route('topic.edit',$item->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('topic.hapus',$item->id) }}" 
                                    class="btn btn-danger btn-action mr-1" 
                                    data-toggle="tooltip" 
                                    title="Delete"
                                    onclick="return confirm('Are you sure? This action cannot be undone.')">
                                    <i class="fas fa-trash"></i>
                               </a>
        
                                <a href="{{ route('topic.detail',$item->id) }}" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>
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
  </section>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [5, 10, 25, 50],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data",
                "infoFiltered": "(Difilter dari _MAX_ total data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>



