@extends('layouts.default')
@section('content')

<section class="section">
    <div class="section-header">
        <h1> Portal</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Portal</h4>
                    <div class="card-header-action">
                        @can('ticket-create')
                            <a href="{{ route('ticket.addData') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
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

        @session('success')
            <div class="alert alert-success" role="alert"> 
                {{ $value }}
            </div>
        @endsession

    <table id="ticketTable" class="table table-striped mb-0">

    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            {{-- <th>Roles</th> --}}
            <th width="280px">Action</th>
        </tr>
    </thead>

    <tbody>

    </tbody>
        @foreach ($data as $key => $portal)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $portal->name }}</td>
                <td>{{ $portal->email }}</td>
                {{-- <td>
                @if(!empty($portal->getRoleNames()))
                    @foreach($portal->getRoleNames() as $v)
                    <label class="badge bg-success">{{ $v }}</label>
                    @endforeach
                @endif
                </td> --}}
                <td>
                    <div class="flex items-center space-x-2">
                        <!-- Tombol Show -->
                        {{-- <a class="btn btn-info btn-sm" href="{{ route('portal.show', $portal->id) }}">
                            <i class="fa-solid fa-list"></i> Show
                        </a> --}}

                        <a href="{{ route('portal.show',$portal->id) }}" class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Detail"><i class=" fas fa-eye"></i></a>

                    
                        <!-- Tombol Edit -->
                        {{-- <a class="btn btn-primary btn-sm" href="{{ route('portal.edit', $portal->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a> --}}

                       
                        <a href="{{ route('portal.edit',$portal->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                       
                    
                        <!-- Ikon Chatting -->
                        {{-- <a wire:navigate href="{{ route('chat', $portal->id) }}"
                            class="relative text-green-600 hover:underline flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 120 120" stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                    
                            <!-- Badge Notifikasi -->
                            <span id="unread-count-{{ $portal->id }}"
                                class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-1 py-0.5 rounded-full">
                                {{ $portal->unread_messages_count > 0 ? $portal->unread_messages_count : '' }}
                            </span>
                        </a> --}}
                    
                        <!-- Tombol Delete -->
                        {{-- <form method="POST" action="{{ route('portal.delete', $portal->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form> --}}

                        @can('ticket-delete')
                            <a href="{{ route('portal.delete',$portal->id) }}" class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure? This action cannot be undone.')"><i class="fas fa-trash"></i>
                        </a>
                        @endcan
                    </div>
                    
                    
                </td>
            </tr>
        @endforeach
    </table>

{!! $data->links('pagination::bootstrap-5') !!}


@endsection
