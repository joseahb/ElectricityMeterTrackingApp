<?php

namespace App\Imports;

use Hash;
use Carbon\Carbon;
use App\Models\Meter;
use App\Models\Consumption;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;

class ExcelImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 3;
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
        $consumption = new Consumption([
            'Date'=> $row[0],
            'BuildingName'=> $row[1],
            'TotalVolume'=> $row[3],
            'TotalUnits'=> $row[4],
            'PrincipleAmount'=> $row[5],
            'PrincipleAmountExclVat'=> $row[6],
            'VAT'=> $row[7],
            'ArrearsAmount'=> $row[8],
            'TarrifIndex'=> $row[9],
        ]);
        if (isset($row[2])) {
            $meter = new Meter();
            $meter->MeterNumber = $row[2];
            $meter->save();
            $consumption->meter_id = $meter->id;
        }
        return $consumption;
    }

    public function transformDate($value, $format = 'dd-mm-yyyy') //i was just saying here that im experiencing a bug but we can discuss this one another time its not urgent
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
