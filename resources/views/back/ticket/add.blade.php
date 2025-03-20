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
              <h4>Form Tambah Ticket</h4>
            </div>
            <div class="card-body p-0">
              <form action="{{ route('ticket.prosesTambah') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="no_telepon" class="form-label">No.Telepon</label>
                    <input type="number" name="no_telepon" class="form-control" required value="{{ old('no_telepon') }}">
                    @error('no_telepon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                    <div class="form-group">
                        <label for="peran" class="form-label">Peran</label>
                        <select name="unit_id" id="unit" class="form-control">
                            <option value="">Pilih Peran</option>
                            @foreach ($master_unit as $item)
                                <option value="{{ $item->id }}" {{ old('unit_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('topic_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="unit_kerja" class="form-label">Unit Kerja</label>
                        <select name="unit_kerja_id" id="unit_kerja" class="form-control">
                            <option value="">Pilih Unit Kerja</option>
                            @foreach ($unit_kerja as $item)
                                <option value="{{ $item->id }}" {{ old('unit_kerja_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('topic_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="topic_id" id="kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($topic_master as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="sub_kategori" class="form-label">Sub Kategori</label>
                        <select name="type_id" id="sub_kategori" class="form-control">
                            <option value="">Pilih Sub Kategori</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" required value="{{ old('judul') }}">
                        @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="description" id="deskripsi" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="lampiran" class="form-label">Lampiran</label>
                        <input type="file" name="lampiran[]" id="lampiran" multiple>
                    </div>

                
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="" class="btn btn-secondary"> Kembali</a>
              </div>
              </form>

     <!-- Skrip AJAX -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#kategori').on('change', function () {
                        var topicId = $(this).val();  // Ambil ID kategori yang dipilih
                        if (topicId) {
                            $.ajax({
                                url: '{{ url("/get-subcategories") }}',
                                type: 'POST',
                                data: {
                                    topic_id: topicId,  // Kirim ID kategori ke controller
                                    _token: '{{ csrf_token() }}'  // CSRF token
                                },
                                success: function (data) {
                                    console.log(data);  // Cek data yang dikembalikan server
                                    $('#sub_kategori').empty().append('<option value="">Pilih Sub Kategori</option>');
                                    $.each(data, function (key, value) {
                                        $('#sub_kategori').append('<option value="' + value.id + '">' + value.name + '</option>');
                                    });
                                },
                                error: function () {
                                    alert('Terjadi kesalahan. Silakan coba lagi.');
                                }
                            });
                        } else {
                            $('#sub_kategori').empty().append('<option value="">Pilih Sub Kategori</option>');
                        }
                    });
                });
            </script>
            
            </div>
          </div>
        </div>
      </div>
</section>

@endsection;
