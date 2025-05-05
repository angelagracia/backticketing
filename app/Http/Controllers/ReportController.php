<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Report;
use Illuminate\Support\Str;
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
            $query = Report::with('status','unitKerja','unit','topic','type')
                           ->select('tickets.*');

            // Filter by name
            if ($request->filled('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            // Filter by ticket_number
            if ($request->filled('ticket_number')) {
                $query->where('ticket_number', 'like', '%' . $request->ticket_number . '%');
            }

            // Filter by status
            if ($request->filled('status')) {
                $statusMap = [
                    'open' => 1,
                    'processed' => 2,
                    'closed' => 3,
                ];
                $statusId = $statusMap[$request->status] ?? null;
                if ($statusId) {
                    $query->where('status_id', $statusId);
                }
            }

            return DataTables::of($query)
                ->addColumn('unit_kerja', fn($row) => $row->unitKerja->name ?? '-')
                ->addColumn('unit', fn($row) => $row->unit->name ?? '-')
                ->addColumn('topic', fn($row) => $row->topic->name ?? '-')
                ->addColumn('type', fn($row) => $row->type->name ?? '-')
                ->addColumn('status', fn($row) => $row->status->name ?? '-')
                ->addColumn('req_description', fn($row) => Str::limit($row->req_description, 50)) // optional
                ->addColumn('lampiran', function ($row) {
                    if ($row->attachment) {
                        // Pastikan path-nya sesuai penyimpanan kamu
                        $url = asset('storage/' . $row->attachment); // jika disimpan di storage/app/public/
                        return '<a href="' . $url . '" target="_blank">Lihat Lampiran</a>';
                    } else {
                        return '-';
                    }
                })
                ->rawColumns(['action', 'lampiran']) // biar HTML di lampiran tidak di-escape
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
