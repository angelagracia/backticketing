@extends('layouts.default')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Data Users</h1>
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
            <h4>Users</h4>
            <div class="card-header-action">
              <a href="{{ route('users.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>Roles</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>                         
                  @foreach ($master_users as $key => $user)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                 <label class="badge bg-success">{{ $v }}</label>
                              @endforeach
                            @endif
                          </td>

                          
                            
                            <td>
                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('users.delete',$user->id) }}" 
                                  class="btn btn-danger btn-action mr-1" 
                                  data-toggle="tooltip" 
                                  title="Delete"
                                  onclick="return confirm('Are you sure? This action cannot be undone.')">
                                  <i class="fas fa-trash"></i>
                               </a>
                              
                                <a href="{{ route('users.detail',$user->id) }}" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>
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

