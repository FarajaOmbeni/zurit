<?php

namespace App\Imports;

use App\Models\Marketing_Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        if(empty($row['name']) || empty($row['email']) || empty($row['phone'])) {
            return null;
        }
        
        // Define how to create a model from the Excel row data
        return new Marketing_Contact([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            // Add more columns as needed
        ]);
    }
}
