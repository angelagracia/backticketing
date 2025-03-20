@extends('layouts.default')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Tipe</h4>
                </div>
                <div class="card-body p-0">
                    <form action="" method="get">
                        @csrf
                        <input type="hidden" name="id" value="{{ $master_type->id }}">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Sub Kategori</label>
                            <input type="text" name="name" class="form-control" value="{{ $master_type->name }}" required readonly> 
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Topik Kategori</label>
                            <select name="topic_id" id="type" class="form-control" readonly>
                                <option value="">Pilih Topik Kategori</option>
                                @foreach ($master_topic as $item)
                                    <option value="{{ $item->id }}" {{ $master_type->topic_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Created At</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $master_type->created_at }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="description">Updated At</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $master_type->updated_at }}" readonly>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="{{ route('sub_kategori.index') }}" class="btn btn-secondary"> Kembali</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection