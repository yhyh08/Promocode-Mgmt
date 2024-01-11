<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\ExcelImport;

class ExcelImportController extends Controller
{
    public function import()
    {
        $r=request();
        // Validate the uploaded file
        $r->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
 
        // Get the uploaded file
        $file = $r->file('file');
 
        // Process the Excel file
        Excel::import(new ExcelImport, $file);
 
        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }

    public function index()
    {
        // Define how to create a model from the Excel row data
        return view('excelImport');
    }
}
