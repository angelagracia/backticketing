@extends('layouts.default')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Role</h1>
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
            <h4>Data Role</h4>
            <div class="card-header-action">
              <a href="add" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>                         
                    @foreach ($master_roles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
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

