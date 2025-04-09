<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        return Report::with('status')->get(); // Pastikan 'status' adalah relasi
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Nomor Ticket',
            'Status',
        ];
    }

    public function map($report): array
    {
        return [
            $report->id,
            $report->name,
            $report->ticket_number,
            $report->status->name ?? '-', // Pastikan ada relasi status()
        ];
    }
}

