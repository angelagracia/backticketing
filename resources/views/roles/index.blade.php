@extends('layouts.default')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>Roles</h1>
  </div>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Data Roles</h4>
      @can('role-create')
      <a href="{{ route('roles.create') }}" class="btn btn-primary">Tambah</a>
      @endcan
      
    
    </div>

    @if(session('success'))
      <div class="alert alert-success m-3">
        {{ session('success') }}
      </div>
    @endif

    <div class="card-body p-0">
      <table class="table table-bordered mb-0">
        <thead>
          <tr>
            <th width="80px">No</th>
            <th>Name</th>
            <th width="300px">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($roles as $role)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $role->name }}</td>
              <td>
                <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">
                  <i class="fa-solid fa-list"></i> Show
                </a>
                {{-- @can('role-edit') --}}
                @can('role-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">
                  <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
              @endcan
              
                {{-- @endcan --}}
                @can('role-delete')
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash"></i> Delete
                  </button>
                </form>
              @endcan
              
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center">Tidak ada data role.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="card-footer text-right">
      {{ $roles->links('pagination::bootstrap-5') }}
    </div>

  </div>
</section>

@endsection
