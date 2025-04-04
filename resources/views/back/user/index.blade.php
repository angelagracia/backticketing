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

                                {{-- chat livewire --}}
                                <a class="relative" wire:navigate href="{{ route('chat', $user->id) }}"
                                  class="text-green-600 hover:underline flex items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                      class="size-6 me-1">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                  </svg>

                                  {{-- Display unread message count --}}
                                  <span id="unread-count-{{ $user->id }}"
                                      class="{{ $user->unread_messages_count > 0 ? 'absolute top-0 right-11 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full' : '' }}">
                                      {{ $user->unread_messages_count > 0 ? $user->unread_messages_count : null }}
                                  </span>
                              </a>
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

