@extends('layouts.default')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>User</h1>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah User</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body p-0">
                        <form action="{{ route('users.prosesEdit') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}"> <!-- Tambahkan ini -->
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary"> Kembali</a>
                            </div>
                        </form>
                        
                        
                </div>
            </div>
        </div>
    </div>
</section>
@endsection