<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class CreateKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama' => 'Programming',
            'jenis' => 'Laravel',
        ]);
    }
}
