<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Menu;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Memulai query untuk mengambil data Report
        $query = Report::query();

        // Filter berdasarkan Nama
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filter berdasarkan Nomor Ticket
        if ($request->has('ticket_number') && $request->ticket_number != '') {
            $query->where('ticket_number', 'like', '%' . $request->ticket_number . '%');
        }

        // Filter berdasarkan Status
        if ($request->has('status') && $request->status != '') {
            $query->whereHas('status', function ($query) use ($request) {
                $query->where('name', $request->status);
            });
        }

        // Mengambil data dengan relasi attachments
        $report = $query->with('attachments')->paginate(10); // Paginate jika data banyak

        // Mengambil data menu (jika ada)
        $menu_master = Menu::all();

        // Mengembalikan view dengan data yang sudah difilter
        return view('back.report.index', compact('report', 'menu_master'));
    }
}
