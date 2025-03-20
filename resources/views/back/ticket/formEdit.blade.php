@extends('layouts.default')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Ticket</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Ticket</h4>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('ticket.prosesEdit') }}" method="post">
                    @csrf
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $ticket->id }}">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $ticket->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $ticket->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon" class="form-label">No. Telepon</label>
                                <input type="number" name="no_telepon" class="form-control" value="{{ $ticket->telepon }}" required>
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-label">Peran</label>
                                <select name="unit_id" id="unit" class="form-control" readonly>
                                    <option value="">Pilih Peran</option>
                                    @foreach ($master_unit as $item)
                                        <option value="{{ $item->id }}" {{ $ticket->unit_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                <select name="unit_kerja" id="unit_kerja" class="form-control" readonly>
                                    <option value="">Pilih Unit Kerja</option>
                                    @foreach ($unit_kerja as $item)
                                        <option value="{{ $item->id }}" {{ $ticket->unit_kerja_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" readonly>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($topic_master as $item)
                                        <option value="{{ $item->id }}" {{ $ticket->topic_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_kategori" class="form-label">Sub Kategori</label>
                                <select name="sub_kategori" id="sub_kategori" class="form-control" readonly>
                                    <option value="">Pilih Sub Kategori</option>
                                    @foreach ($master_type as $item)
                                        <option value="{{ $item->id }}" {{ $ticket->type_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_kategori" class="form-label">Sub Kategori</label>
                                <select name="sub_kategori" id="sub_kategori" class="form-control" readonly>
                                    <option value="">Pilih Sub Kategori</option>
                                    @foreach ($master_type as $item)
                                        <option value="{{ $item->id }}" {{ $ticket->type_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ $ticket->title }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control" required readonly>{{ $ticket->req_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="lampiran">Lampiran (Bisa Upload Banyak File)</label>
                                <input type="file" name="lampiran[]" class="form-control" multiple>
                            </div>
                        
                            {{-- Tampilkan Lampiran Lama --}}
                            <div class="form-group">
                                <label>Lampiran Lama:</label>
                                {{-- @foreach ($ticket->attachments as $attachment)
                                    <div>
                                        <p>Path: {{ asset('storage/' . $attachment->file_path) }}</p>
                                        <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="Lampiran" style="max-width: 150px; max-height: 150px; display: block;">
                                        <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">{{ $attachment->file_path }}</a>
                                    </div>
                                @endforeach --}}
                                @foreach ($ticket->attachments as $attachment)
                                    <div>
                                        <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="Lampiran" style="max-width: 150px; max-height: 150px; display: block;">
                                        <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">{{ $attachment->file_name }}</a>
                                        <input type="checkbox" name="delete_lampiran[]" value="{{ $attachment->id }}"> Hapus
                                    </div>
                                @endforeach


                            
                            </div>
                            {{-- <div class="form-group">
                                <label for="" class="form-label">Status</label>
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-control" required>
                                        @foreach ($enumValues as $value)
                                            <option value="{{ $value }}" {{ old('status', $menu->status) == $value ? 'selected' : '' }}>
                                                {{ ucfirst($value) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                             --}}
                            
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit"class="btn btn-primary mr-1">Edit</button>
                            <a href="{{ route('ticket.index')}}" class="btn btn-secondary"> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection