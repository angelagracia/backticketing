<?php
namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ReportExport implements FromCollection
{
    public function collection()
    {
        return Report::select('id', 'name', 'ticket_number', 'status_id')->get();
    }
}
