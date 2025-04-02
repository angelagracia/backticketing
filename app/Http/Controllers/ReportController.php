<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;


class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Jika request AJAX (DataTables meminta data)
        if ($request->ajax()) {
            $query = Report::with('status')->select('tickets.*'); // Ubah 'reports.*' ke 'tickets.*'
        
            return DataTables::eloquent($query)
                ->addColumn('status', function ($report) {
                    return $report->status->name ?? '-';
                })
                ->addColumn('action', function ($report) {
                    return '<a href="#" class="btn btn-sm btn-primary">Detail</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        

        // Jika request bukan AJAX, tampilkan halaman dengan menu
        $menu_master = Menu::whereNull('parent_code')->with('children')->orderBy('sequence')->get();
        return view('back.report.index', compact('menu_master'));
    }

    public function export()
    {
        return Excel::download(new ReportExport, 'reports.xlsx');
    }
}
