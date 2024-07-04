<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $customer = Customer::where('name', $row['name'])->first();

            if ($customer) {
                $customer->update([
                    'age' => $row['age'],
                    'phone' => $row['phone'],
                    'image' => $row['image'],
                ]);
            } else {
                Customer::create([
                    'name' => $row['name'],
                    'age' => $row['age'],
                    'phone' => $row['phone'],
                    'image' => $row['image'],
                ]);
            }
        }
    }
}
