@extends('layouts.default')
@section('content')

<section class="section">
    <div class="section-header">
        <h1> Ticket</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Ticket</h4>
                    <div class="card-header-action">
                    <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Report</a>
                </div>
            </div>

            <form action="{{ route('report.index') }}" method="GET">
                <div>
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" value="{{ request('name') }}" placeholder="Cari nama...">
                </div>
        
                <div>
                    <label for="ticket_number">Nomor Ticket:</label>
                    <input type="text" id="ticket_number" name="ticket_number" value="{{ request('ticket_number') }}" placeholder="Cari nomor ticket...">
                </div>
        
                <div>
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="">Pilih Status</option>
                        <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
        
                <button type="submit">Cari</button>
            </form>
            

            <div class="card-body p-0">
                <div class="table-responsive">
                <table class="table table-striped mb-0" id="dataTable">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>No. Ticket</th>
                            <th>Email</th>
                            <th>No. Telepon</th>
                            <th>Status</th>
                            <th>Lampiran</th>
                        </tr>
                    </thead>

                    <tbody>                         
                        @foreach ($report as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->ticket_number ?? 'Tidak Ada' }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->status->name }}</td>
                                <td>
                                    @if ($item->attachments->count() > 0)
                                        @foreach ($item->attachments as $attachment)
                                            @if (in_array(strtolower(pathinfo($attachment->file_path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']))
                                                <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $attachment->file_path) }}" alt="Lampiran {{ $loop->iteration }}" style="width: 100px; height: auto;">
                                                </a>
                                                <br>
                                            @else
                                                <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">
                                                    Lampiran {{ $loop->iteration }}
                                                </a>
                                                <br>
                                            @endif
                                        @endforeach
                                    @else
                                        Tidak Ada Lampiran
                                    @endif
                                </td>                                
                                {{-- <td>{{ $item->description }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Menampilkan pagination -->
                {{-- {{ $report->links() }} --}}
            </div>
        </div>
    </div>
</section>

@endsection