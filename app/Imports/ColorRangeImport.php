<?php

namespace App\Imports;

use App\Models\ColorRange;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ColorRangeImport implements ToModel, WithValidation, WithHeadingRow
{
    public function headings(): array
    {
        return [
            'country',
            'value',
        ];

    }

    public function model(array $row)
    {
        $excelMap = ColorRange::updateOrCreate(
            ['country' => $row['country']],
            ['value' => $row['value']]
        );
        return $excelMap;
    }

    public function rules(): array
    {
        return [
            'country' => 'required',
            'value' => 'required|numeric',
        ];
    }
}
