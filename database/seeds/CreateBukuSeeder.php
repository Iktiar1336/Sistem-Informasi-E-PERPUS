<?php

use Illuminate\Database\Seeder;
use App\Buku;

class CreateBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'kode' => 'BK-001',
            'judul' => 'Belajar Laravel',
            'kategori' => 'Programming',
            'Penulis' => 'Yudho Yudhanto dan Helmi Adi Prasetyo',
            'penerbit' => 'Elex Media Komputindo',
            'tahun_terbit' => '29-09-2018',
            'tebal' => '236',
            'jumlah' => '8',
            'gambar' => 'laravel.jpg',
        ]);
    }
}
