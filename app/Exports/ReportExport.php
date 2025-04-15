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

        return Report::with('unitKerja','status','unit','topic','type')->get();

        
    }

    public function headings(): array
    {
        return [
            'ID',
            'Status',
            'Nama',
            'Nomor Ticket',
            'Email',
            'No.Telepon',
            'Peran',
            'Unit Kerja',
            'Kategori',
            'Sub Kategori',
            'Judul',
            'Deskripsi',
            'Lampiran',
        ];
    }

    public function map($report): array
    {
        return [
            $report->id,
            $report->status->name ?? '-',
            $report->name,
            $report->ticket_number,
            $report->email,
            $report->telepon,
            $report->unit->name ?? '-',
            $report->unitKerja->name ?? '-',
            $report->topic->name ?? '-',
            $report->type->name ?? '-',
            $report->title,
            $report->description,
            $report->attachment,
        ];
    }
}

