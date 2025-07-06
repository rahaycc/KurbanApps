<?php

namespace App\Exports;

use App\Models\Hewan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class MonthlyReportExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping
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
            ->whereBetween('created_at', [$this->startDate, $this->endDate]);

        if (!is_null($this->status) && $this->status !== '') {
            $query->where('status', $this->status);
        }

        return $query;
    }

    public function map($hewan): array
    {
        return [
            $hewan->id,
            $hewan->nama,
            $hewan->jenis_hewan,
            $hewan->jenis_kelamin,
            $hewan->umur,
            $hewan->berat,
            $hewan->warna,
            $hewan->poel,
            $hewan->mata,
            $hewan->kaki,
            $hewan->tanduk,
            $hewan->ekor,
            $hewan->telinga,
            $hewan->skor . '%',
            $hewan->status,
            $hewan->created_at->format('d-m-Y'), // tanpa jam
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Hewan',
            'Jenis Hewan',
            'Jenis Kelamin',
            'Umur',
            'Berat (Kg)',
            'Warna',
            'Poel',
            'Mata',
            'Kaki',
            'Tanduk',
            'Ekor',
            'Telinga',
            'Skor',
            'Status',
            'Tanggal Input',
        ];
    }
}
