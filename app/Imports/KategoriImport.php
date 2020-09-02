<?php

namespace App\Imports;

use App\Kategori;
use Illuminate\Support\Str;
use File;
use Maatwebsite\Excel\Concerns\ToModel;

class KategoriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kategori([
            'nama' => $row[0],
        ]);
    }
}
