@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('roles.update', $role->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $role->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                {{-- @foreach ($menu as $menuItem)
                <div>
                    <strong>{{ $menuItem->name }}</strong>
                    <div>
                        @foreach ($menuItem->permissions as $permission)
                            <label>
                                <input type="checkbox" name="permission[{{ $permission->id }}]"
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                {{ $permission->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
             --}}


             {{-- <pre> --}}
                @foreach ($menu as $menuItem)
                <div class="menu-permission-group mb-4 p-3 border rounded shadow-sm bg-light">
                    <h5 class="text-primary mb-2">{{ $menuItem->name }}</h5>
            
                    @php
                        // Group submenu berdasarkan 'code' di permissions
                        $grouped = $menuItem->permissions->groupBy('code');
                    @endphp
            
                    {{-- Looping tiap group code (ex: kategori_code, sub_kategori_code) --}}
                    @foreach ($grouped as $code => $permissionsGroup)
                        <div class="submenu-block mt-3 ml-3">
                            <h6 class="text-secondary">
                                @if ($menuItem->code === 'referensi_code')
                                    <i class="fas fa-angle-right mr-1"></i>
                                @endif
                                {{ ucwords(str_replace('_', ' ', str_replace('_code', '', $code))) }}
                            </h6>
                            <div class="d-flex flex-wrap gap-2 ml-3">
                                @foreach ($permissionsGroup as $permission)
                                    <div class="form-check mr-4">
                                        <input class="form-check-input" type="checkbox" name="permission[{{ $permission->id }}]"
                                            value="{{ $permission->id }}"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ ucfirst(preg_replace("/^{$code}_/", '', $permission->name)) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            
            
                {{-- </pre> --}}
                
            

            
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
