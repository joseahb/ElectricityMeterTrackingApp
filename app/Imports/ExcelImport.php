<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\MeterNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Hash;

class ExcelImport implements ToModel,  WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ","
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MeterNumber([
            'Date'=> $row[0],
            'BuildingName'=> $row[1], 
            'MeterNumber'=> $row[2],
            'TotalVolume'=> $row[3],
            'TotalUnits'=> $row[4],
            'PrincipleAmount'=> $row[5],
            'PrincipleAmountExclVat'=> $row[6],
            'VAT'=> $row[7],
            'ArrearsAmount'=> $row[8],
            'TarrifIndex'=> $row[9],
        ]);
    }
}