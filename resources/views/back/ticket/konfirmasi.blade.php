@extends('layouts.default')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Konfirmasi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Konfirmasi Ticket</h4>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('ticket.prosesKonfirmasi', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $ticket->id }}">
                            <div class="form-group">
                                <label for="nama">Nama Pengirim</label>
                                <input type="text" name="nama" id="name" class="form-control" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                            </div>
            
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="lampiran">Lampiran (opsional)</label>
                                <input type="file" name="lampiran[]" class="form-control">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Konfirmasi & Tutup</button>
                            <a href="{{ route('ticket.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection