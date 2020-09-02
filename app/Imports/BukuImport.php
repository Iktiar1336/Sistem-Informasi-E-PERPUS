<?php

namespace App\Imports;

use App\Buku;
use File;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class BukuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $latestkode = Buku::orderBy('created_at','DESC')->first();
        return new Buku([
            'kode' => 'BK-'.str_pad($latestkode->id + 1, 3, "0", STR_PAD_LEFT),
            'judul' => $row[1],
            'penulis' => $row[2],
            'kategori' => $row[3],
            'penerbit' => $row[4],
            'tahun_terbit' => $row[5],
            'tebal' => $row[6],
            'jumlah' => $row[7],
            'gambar' => $row[8],
        ]);
    }
}
