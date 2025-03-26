@extends('layouts.default')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Unit Kerja</h1>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Unit Kerja</h4>
                    </div>
                    <div class="card-body p-0">
                        <form action="{{ route('unit_kerja.prosesTambah') }}" method="post">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Unit Kerja</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit"class="btn btn-primary">Tambah</button>
                            <a href="{{ route('unit_kerja.index')}}" class="btn btn-secondary"> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection