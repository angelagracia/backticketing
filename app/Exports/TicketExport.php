<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Ticket::select('name', 'ticket_number', 'status')->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nomor Ticket',
            'Status',
        ];
    }
}
