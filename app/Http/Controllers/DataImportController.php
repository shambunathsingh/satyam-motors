<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\CustomerImport;
use App\Imports\ProductImport;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

use Log;

class DataImportController extends Controller
{

    public function importExcelData(Request $request)
    {
        $request->validate([
            'excel_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new CustomerImport, $request->file('excel_file'));

        return redirect()->back()->with('status', 'Imported Successfully');
    }

    public function productImportExcelData(Request $request)
    {
        $request->validate([
            'excel_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new ProductImport, $request->file('excel_file'));

        return redirect()->back()->with('success', 'Product Imported successfully.');
    }

    public function productExportExcelData()
    {
        $date = date('d-m-Y');

        return Excel::download(new ProductExport, 'AllProductSheet_' . $date . '.xlsx');
    }
}
