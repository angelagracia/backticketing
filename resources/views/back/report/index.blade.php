@extends('layouts.default')

@section('content')

<section class="section">
    <div class="section-header">
        <h1> Ticket</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Ticket</h4>
                    <div class="card-header-action">
                        <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Report</a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Form Pencarian -->
                    <form action="{{ route('report.index') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">Nama:</label>
                                <input type="text" id="name" name="name" value="{{ request('name') }}" class="form-control" placeholder="Cari nama...">
                            </div>
                            <div class="col-md-3">
                                <label for="ticket_number">Nomor Ticket:</label>
                                <input type="text" id="ticket_number" name="ticket_number" value="{{ request('ticket_number') }}" class="form-control" placeholder="Cari nomor ticket...">
                            </div>
                            <div class="col-md-3">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>

                    <!-- DataTables -->

                    <a href="{{ route('report.export') }}" class="btn btn-success">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                    
                    <div class="table-responsive">
                        <table id="reportTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Unit Kerja</th>
                                    <th>Nomor Ticket</th>
                                    <th>Email</th>
                                    <th>No.Telepon</th>
                                    <th>Status</th>
                                    <th>Peran</th>
                                    <th>Kategori</th>
                                    <th>Sub Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>lampiran</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Tambahkan ini di dalam <head> atau sebelum script DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    

<!-- DataTables JS -->
<script>
    $(document).ready(function () {
        $('#reportTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('report.index') }}",
                "type": "GET",
                "error": function(xhr, error, thrown) {
                    console.log("Error:", xhr.responseText);
                }
            },
            "columns": [
                { "data": "name" },
                { "data": 'unit_kerja', name: 'unit_kerja' },
                { "data": "ticket_number" },
                { "data": "email" },
                { "data": "telepon" },
                { "data": "status" },
                { "data": "unit" },
                { "data": "topic" },
                { "data": "type" },
                { "data": "req_description" },
                { "data": "lampiran", render: function(data, type, row) {
                    return '<a href="' + data + '" target="_blank">Lihat Lampiran</a>';
                }},
                // { "data": "action", "orderable": false, "searchable": false }
            ]
        });
    });
</script>


@endsection
