<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hewan;
    
class DashboardController extends Controller
{
    public function index()
    {
        $total = Hewan::count();
        $layak = Hewan::where('status', 'Layak')->count();
        $tidak_layak = Hewan::where('status', 'Tidak Layak')->count();
        $hewans = Hewan::all();
        $periods = Hewan::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
        ->groupBy('year', 'month')
        ->orderByDesc('year')
        ->orderByDesc('month')
        ->get();


        return view('dashboard', compact('total', 'layak', 'tidak_layak', 'hewans','periods'));
    }
}
