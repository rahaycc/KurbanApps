<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MonthlyReportExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(){
        return view('laporan.index');
    }

    public function exportReport(Request $request)
    {
        $dateRange = explode(' - ', $request->input('date_range'));
        $startDate = $dateRange[0];
        $endDate = $dateRange[1];
        $status = $request->input('status');

        return Excel::download(new MonthlyReportExport($startDate, $endDate, $status), 'monthly_report.xlsx');

    }

}
