<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;

class ReportTable extends Component
{
    public $reports;

    public function mount()
    {
        $this->reports = Report::with('status')->get();
    }

    public function exportExcel()
    {
        return response()->streamDownload(function () {
            Excel::download(new ReportExport, 'laporan_ticket.xlsx')->send();
        }, 'laporan_ticket.xlsx');
    }

    public function render()
    {
        return view('livewire.ticket-table');
    }
}

