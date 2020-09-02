<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = ['judul','penulis','penerbit','tahun_terbit','tebal','kode','jumlah','gambar','kategori'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public static function getAutoNumberOptions()
    {
        return [
            'order_number' => [
                'format' => date('ymd') .'/?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }
}
