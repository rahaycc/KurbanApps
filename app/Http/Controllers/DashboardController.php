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

        return view('dashboard', compact('total', 'layak', 'tidak_layak', 'hewans'));
    }
}
