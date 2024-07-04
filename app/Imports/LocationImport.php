<?php

namespace App\Imports;

use App\Models\Location\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocationImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $location = Location::where('countries', $row['countries'])->first();

            if ($location) {
                $location->update([
                    'countries' => $row['countries'],
                    'abbreviation' => $row['abbreviation'],
                    'state' => $row['state'],
                    'cities' => $row['cities'],
                ]);
            } else {
                Location::create([
                    'countries' => $row['countries'],
                    'abbreviation' => $row['abbreviation'],
                    'state' => $row['state'],
                    'cities' => $row['cities'],
                ]);
            }
        }
    }
}
