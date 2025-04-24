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
                    <form action="" method="GET" class="mb-4">
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
                                    <option value="processed" {{ request('status') == 'processed' ? 'selected' : '' }}>Proses</option>
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
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('report.index') }}",
                type: "GET",
                data: function (d) {
                    d.name = $('#name').val();
                    d.ticket_number = $('#ticket_number').val();
                    d.status = $('#status').val();
                }
            },
            columns: [
                { data: "name" },
                { data: "unit_kerja" },
                { data: "ticket_number" },
                { data: "email" },
                { data: "telepon" },
                { data: "status" },
                { data: "unit" },
                { data: "topic" },
                { data: "type" },
                { data: "req_description" },
                {
                    data: "lampiran",
                    render: function (data) {
                        return data ? '<a href="' + data + '" target="_blank">Lihat Lampiran</a>' : '-';
                    }
                }
            ]
        });

        $('#filterForm').on('submit', function(e) {
            e.preventDefault(); // cegah reload halaman
            $('#reportTable').DataTable().ajax.reload(); // reload data tabel
        });

    });
</script>


@endsection
