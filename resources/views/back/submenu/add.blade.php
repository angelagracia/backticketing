@extends('layouts.default')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Sub Menu</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Sub Menu</h4>
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


                <div class="card-body">
                    <form action="{{ route('sub-menu.prosesAdd') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <!-- Nama Sub Menu -->
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Sub Menu</label>
                                <input type="text" id="name" name="name" class="form-control" required autocomplete="off">
                            </div>

                            <!-- Dropdown Menu -->
                            <div class="form-group">
                                <label for="menuSelect" class="form-label">Menu</label>
                                <select name="menu_code" id="menuSelect" class="form-control" required>
                                    <option value="">-- Pilih Menu --</option>
                                    @foreach ($master_sub_menu as $menu)
                                        <option value="{{ $menu->code }}" data-code="{{ $menu->code }}">{{ $menu->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <!-- Menu Code (Readonly) -->
                            <div class="form-group">
                                <label for="menuCode" class="form-label">Menu Code</label>
                                <input type="text" id="menuCode" class="form-control" readonly>
                            </div>

                            <!-- URL Input -->
                            <div class="form-group">
                                <label for="url" class="form-label">URL</label>
                                <input type="text" id="url" name="url" class="form-control" required autocomplete="off">
                            </div>

                            <!-- Icon Input -->
                            <div class="form-group">
                                <label for="icon" class="form-label">Icon</label>
                                <input type="text" id="icon" name="icon" class="form-control" required autocomplete="off">
                            </div>

                            <!-- Status Dropdown -->
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    @foreach ($enumValues as $value)
                                        <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Code Input -->
                            <div class="form-group">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" id="code" name="code" class="form-control" required autocomplete="off">
                            </div>

                            <!-- Sequence Input -->
                            <div class="form-group">
                                <label for="sequence" class="form-label">Sequence</label>
                                <input type="number" id="sequence" name="sequence" class="form-control" required>
                            </div>
                        </div>

                        <!-- Form Footer with Buttons -->
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener untuk perubahan pada dropdown menuSelect
        $('#menuSelect').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var menuCode = selectedOption.data('code'); // Ambil nilai data-code dari opsi yang dipilih

            // Set nilai menu_code pada input field menuCode
            $('#menuCode').val(menuCode);
        });
    });
</script>
@endsection
