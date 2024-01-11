<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\TermCondition;

class ExcelImport implements ToModel
{
    public function model(array $row)
    {
        // Assuming you have a 'your_table' table with columns 'column1' and 'column2'
        return new TermCondition([
            'title' => $row['0'],
            'content' => $row['1'],
            // Add more columns as needed
        ]);
    }
}
