<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('layouts.default');
        $menu_master = Menu::all(); 
        $totalTicketsOpen = Ticket::whereHas('status', function ($query) {
            $query->where('name', 'Opens');
        })->count();
        $totalTicketsProses = Ticket::whereHas('status', function ($query) {
            $query->where('name', 'Processed');
        })->count();
        $totalTicketsClose = Ticket::whereHas('status', function ($query) {
            $query->where('name', 'Closed');
        })->count();



        $statuses = Status::all();
        $ticketData = [];

        foreach ($statuses as $status) {
            $ticketData[] = [
                'status' => $status->name,
                'count' => Ticket::where('status_id', $status->id)->count()
            ];
        }


        $units = UnitKerja::withCount('ticket')->get(); // Pastikan ada relasi

        $unitData = [];

        foreach ($units as $unit) {
            $unitData[] = [
                'unit'  => $unit->name,
                'count' => $unit->tickets_count
            ];
        }

        
        return view('back.dashboard', compact('menu_master','totalTicketsOpen','totalTicketsProses','totalTicketsClose','ticketData','unitData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
