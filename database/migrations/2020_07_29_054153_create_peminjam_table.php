<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_buku');
            $table->string('nama_peminjam');
            $table->bigInteger('no_hp');
            $table->string('alamat');
            $table->string('nama_petugas');
            $table->string('tgl_pinjam');
            $table->string('waktu_pinjam');
            $table->string('tgl_pengembalian')->nullable();
            $table->string('status');
            $table->string('denda')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjam');
    }
}
