<?php

namespace App\Exports;

use App\Constants\GeneralStatus;
use App\Models\Administrator;

class AdministratorsExport implements
    \Maatwebsite\Excel\Concerns\FromCollection,
    \Maatwebsite\Excel\Concerns\WithHeadings,
    \Maatwebsite\Excel\Concerns\WithMapping,
    \Maatwebsite\Excel\Concerns\WithColumnWidths
{
    /**
     * Map counter.
     * @var int $counter
     */
    private $counter;

    public function __construct()
    {
        $this->counter = 1;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Administrator::all();
    }

    /**
     * Map each data on collection.
     */
    public function map($administrator): array
    {
        return [
            $this->counter++,
            $administrator->username,
            $administrator->name,
            $administrator->email,
            $administrator->phone,
            GeneralStatus::label($administrator->status),
            human_datetime($administrator->created_at),
            human_datetime($administrator->updated_at),
        ];
    }

    /**
     * Define export heading.
     */
    public function headings(): array
    {
        return [
            'No',
            'Username',
            'Name',
            'Email',
            'Phone',
            'Status',
            'Created Date',
            'Updated Date',
        ];
    }

    /**
     * Define export column width.
     */
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 15,
            'C' => 25,
            'D' => 25,
            'E' => 15,
            'F' => 15,
            'G' => 35,
            'H' => 35,
        ];
    }
}