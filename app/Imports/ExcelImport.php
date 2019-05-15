<?php

namespace App\Imports;

use App\ExcelFile;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ExcelFile([
            'daterow' => $row[0], 
            'courserow' => $row[1], 
            'grouprow' => $row[2], 
            'namerow' => $row[3], 
            'lectures' => $row[4], 
        ]);
    }
}
