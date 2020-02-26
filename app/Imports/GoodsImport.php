<?php

namespace App\Imports;

use App\Good;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GoodsImport implements ToModel,WithStartRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row = $this->validate($row);
        return new Good([
            'rubric_1'  => $row[0],
            'rubric_2' => $row[1],
            'category' => $row[2],
            'manufacturer' => $row[3],
            'product_name' => $row[4],
            'code' => $row[5],
            'description' => $row[6],
            'price' => $row[7],
            'warranty' => $row[8],
            'presence' => $row[9],
        ]);
    }

    private function validate($row){

        if (!is_int($row[8])) $row[8] = NULL ;

        return $row;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
