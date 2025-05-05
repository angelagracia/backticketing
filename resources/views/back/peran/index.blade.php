@extends('layouts.default')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Peran</h1>
    </div>

    <div class="row">
      {{-- <div class="col-lg-5 col-md-12 col-12 col-sm-12">
        <form method="post" class="needs-validation" novalidate="">
          <div class="card">
            <div class="card-header">
              <h4>Quick Draft</h4>
            </div>
            <div class="card-body pb-0">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
                <div class="invalid-feedback">
                  Please fill in the title
                </div>
              </div>
              <div class="form-group">
                <label>Content</label>
                <textarea class="summernote-simple"></textarea>
              </div>
            </div>
            <div class="card-footer pt-0">
              <button class="btn btn-primary">Save Draft</button>
            </div>
          </div>
        </form>
      </div> --}}
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Kategori Peran</h4>
            <div class="card-header-action">
              @can('peran-create')
              <a href="{{ route('peran.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
              @endcan
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">

              @session('success')
                  <div class="alert alert-success" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession

              <table id="peranTable" class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>                         
                    @foreach ($master_unit as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                              @can('peran-edit')
                                <a href="{{ route('peran.edit',$item->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                @endcan
                                @can('peran-delete')
                                <a href="{{ route('peran.delete',$item->id) }}" 
                                  class="btn btn-danger btn-action mr-1" 
                                  data-toggle="tooltip" 
                                  title="Delete"
                                  onclick="return confirm('Are you sure? This action cannot be undone.')">
                                  <i class="fas fa-trash"></i>
                                @endcan
                                <a class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  
  <!-- DataTables JS -->
  <script>
      $(document).ready(function () {
      $('#peranTable').DataTable(); // tanpa serverSide
  });
  </script>

@endsection

