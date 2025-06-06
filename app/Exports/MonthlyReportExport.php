<?php

namespace App\Exports;

use App\Models\Hewan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonthlyReportExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;
    protected $status;

    public function __construct($startDate, $endDate, $status = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
    }

    public function query()
    {
        $query = Hewan::query()
            ->select('id', 'nama', 'jenis', 'status')
            ->whereBetween('created_at', [$this->startDate, $this->endDate]);

        // Jika status diisi, tambahkan filter status
        if (!is_null($this->status) && $this->status !== '') {
            $query->where('status', $this->status);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Hewan',
            'Jenis',
            'Status',
        ];
    }
}
