<?php

namespace App\Exports;

use App\Models\Location\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocationExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Location::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'countries',
            'abbreviation',
            'state',
            'cities'
        ];
    }
}
