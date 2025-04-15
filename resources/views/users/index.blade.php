@extends('layouts.default')
@section('content')

{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
        </div>
    </div>
</div> --}}


<section class="section">
    <div class="section-header">
        <h1> Users</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Users</h4>
                    <div class="card-header-action">
                        @can('ticket-create')
                            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                        @endcan
                </div>
            </div>


@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

<div class="card-body p-0">
    <div class="table-responsive">
    <table id="ticketTable" class="table table-striped mb-0">

        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                {{-- <th>No. Telepon</th> --}}
                {{-- <th>Status</th> --}}
                <th>Action</th>
            </tr>
        </thead>





        <tbody>                         
            @foreach ($data as $key => $user)
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
                    {{-- <td>{{ optional($user->status)->name }}</td> --}}
                    {{-- <td>{{ $item->description }}</td> --}}
                    <td>
                        {{-- @can('role-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        @endcan --}}
                        {{-- @can('role-edit') --}}
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        {{-- @endcan --}}

                          <!-- Badge Notifikasi -->
                        <span id="unread-count-{{ $user->id }}"
                            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-1 py-0.5 rounded-full">
                            {{ $user->unread_messages_count > 0 ? $user->unread_messages_count : '' }}
                        </span>

                        {{-- @can('ticket-delete') --}}
                            <a href="{{ route('users.destroy', $user->id) }}" 
                        class="btn btn-danger btn-action mr-1" 
                        data-toggle="tooltip" 
                        title="Delete"
                        onclick="return confirm('Are you sure? This action cannot be undone.')">
                        <i class="fas fa-trash"></i>
                        </a>
                        {{-- @endcan --}}
                        
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>
                        <a href="{{ route('chat', $user->id) }}" class="btn btn-success btn-action mr-1" data-toggle="tooltip" title="Pesan"><i class="fas fa-comments"></i></a>
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
        $('#ticketTable').DataTable(); // tanpa serverSide
    });
</script>
    @endsection


















   {{-- @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
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
            <div class="flex items-center space-x-2">
                <!-- Tombol Show -->
                <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">
                    <i class="fa-solid fa-list"></i> Show
                </a>
            
                <!-- Tombol Edit -->
                <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
            
                <!-- Ikon Chatting -->
                <a wire:navigate href="{{ route('chat', $user->id) }}"
                    class="relative text-green-600 hover:underline flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 120 120" stroke-width="1.5" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
            
                    <!-- Badge Notifikasi -->
                    <span id="unread-count-{{ $user->id }}"
                        class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-1 py-0.5 rounded-full">
                        {{ $user->unread_messages_count > 0 ? $user->unread_messages_count : '' }}
                    </span>
                </a>
            
                <!-- Tombol Delete -->
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button>
                </form>
            </div>
            
            
        </td>
    </tr>
 @endforeach
</table>

{!! $data->links('pagination::bootstrap-5') !!}

<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection --}}
















{{-- @extends('layouts.default')
@section('content') --}}

{{-- <section class="section">
    <div class="section-header">
        <h1> Ticket</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Ticket</h4>
                    <div class="card-header-action">
                        @can('ticket-create')
                            <a href="{{ route('ticket.addData') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                        @endcan
                </div>
            </div>
            {{-- <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
                    @endcan
                </div> --}}

            {{-- <div class="card-body p-0">
                <div class="table-responsive">
                <table id="ticketTable" class="table table-striped mb-0">

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
                                <td>{{ optional($item->status)->name }}</td> --}}
                                {{-- <td>{{ $item->description }}</td> --}}
                                {{-- <td> --}}
                                    {{-- @can('role-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    @endcan --}}
                                    {{-- @can('role-edit')
                                        <a href="{{ route('ticket.edit',$item->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('ticket-delete')
                                        <a href="{{ route('ticket.delete',$item->id) }}" 
                                    class="btn btn-danger btn-action mr-1" 
                                    data-toggle="tooltip" 
                                    title="Delete"
                                    onclick="return confirm('Are you sure? This action cannot be undone.')">
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    @endcan
                                    <a href="{{ route('ticket.detail',$item->id) }}" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>
                                    <a href="{{ route('chat', $item->id) }}" class="btn btn-success btn-action mr-1" data-toggle="tooltip" title="Pesan"><i class="fas fa-comments"></i></a>
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
    $('#ticketTable').DataTable(); // tanpa serverSide
});
</script> --}}


    