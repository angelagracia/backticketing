@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Portal Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('portal.add') }}"><i class="fa fa-plus"></i> Create New Portal</a>
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
   <tr>
       <th>No</th>
       <th>Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th width="280px">Action</th>
   </tr>
   @foreach ($data as $key => $portal)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $portal->name }}</td>
        <td>{{ $portal->email }}</td>
        <td>
          @if(!empty($portal->getRoleNames()))
            @foreach($portal->getRoleNames() as $v)
               <label class="badge bg-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
            <div class="flex items-center space-x-2">
                <!-- Tombol Show -->
                <a class="btn btn-info btn-sm" href="{{ route('portal.show', $portal->id) }}">
                    <i class="fa-solid fa-list"></i> Show
                </a>
            
                <!-- Tombol Edit -->
                <a class="btn btn-primary btn-sm" href="{{ route('portal.edit', $portal->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
            
                <!-- Ikon Chatting -->
                <a wire:navigate href="{{ route('chat', $portal->id) }}"
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
                </a>
            
                <!-- Tombol Delete -->
                <form method="POST" action="{{ route('portal.delete', $portal->id) }}" style="display:inline">
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
@endsection
