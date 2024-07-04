<?php

namespace App\Http\Controllers\Admin\Location;

use App\Exports\LocationExport;
use App\Http\Controllers\Controller;
use App\Imports\LocationImport;
use App\Models\Location\Location;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LocationController extends Controller
{
    public function import()
    {
        $title = "Carzex - Import Locations";

        $locationlist = Location::all();

        return view('admin.locations.import', ['title' => $title, 'locations' => $locationlist]);
    }

    public function export()
    {
        $title = "Carzex - Export Locations";

        $locationlist = Location::all();

        return view('admin.locations.export', ['title' => $title, 'locations' => $locationlist]);
    }

    public function locationImportExcelData(Request $request)
    {
        $request->validate([
            'excel_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new LocationImport, $request->file('excel_file'));

        return redirect()->back()->with('success', 'Product Imported successfully.');
    }

    public function locationExportExcelData()
    {
        $date = date('d-m-Y');

        return Excel::download(new LocationExport, 'AllLocationSheet_' . $date . '.xlsx');
    }
}
