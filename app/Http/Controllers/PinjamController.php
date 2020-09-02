<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam;
use App\Buku;
use PDF;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = Peminjam::all();
        return view('peminjam.index',['peminjam' => $peminjam]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $buku = Buku::find($id);
        return view('buku.pinjam',['buku' => $buku]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pinjam = new Peminjam;
        if ( $latestkode = Peminjam::orderBy('created_at','DESC')->first()) {
            $pinjam->kode = 'PJM-'.str_pad($latestkode->id + 1, 3, "0", STR_PAD_LEFT);
        }else {
            $pinjam->kode = 'PJM-'.str_pad( + 1, 3, "0", STR_PAD_LEFT);
        }
        $pinjam->nama_buku = $request->judul;
        $pinjam->nama_peminjam = $request->nama_peminjam;
        $pinjam->no_hp = $request->hp;
        $pinjam->alamat = $request->alamat;
        $pinjam->tgl_pinjam = $request->tgl;
        $pinjam->waktu_pinjam = $request->waktu;
        $pinjam->nama_petugas = $request->petugas;
        $pinjam->status = 'Dipinjam';
        $pinjam->save();
        return redirect('/peminjam')->with('sukses',"Buku Berhasil Di Pinjam");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pinjam = Peminjam::find($id);
        $pinjam->nama_buku = $request->nama_buku;
        $pinjam->nama_peminjam = $request->nama_peminjam;
        $pinjam->no_hp = $request->no_hp;
        $pinjam->alamat = $request->alamat;
        $pinjam->tgl_pinjam = $request->tgl_pinjam;
        $pinjam->waktu_pinjam = $request->waktu_pinjam;
        $pinjam->nama_petugas = $request->nama_petugas;
        $pinjam->tgl_pengembalian = $request->tgl_pengembalian;
        $cari_hari = abs(strtotime($pinjam->tgl_pengembalian) - strtotime($pinjam->waktu_pinjam));
        $hitung_hari = floor($cari_hari/(60*60*24));
        
        if($hitung_hari > 0){
            $telat = $hitung_hari - 0;
            $denda = 15000 * $telat;
        }else{
            $telat = 0;
            $denda = 0;
        }
        
        $pinjam->denda = $denda;
        $pinjam->save();
        return redirect('/peminjam')->with('berhasil',"Buku Berhasil DiKembalikan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kembali(Request $request , $id)
    {
        $pinjam = Peminjam::find($id);
        return view('buku.kembali',['pinjam' => $pinjam]);
    }
    public function cetak(Request $request , $id)
    {
        $pinjam = Peminjam::find($id);
        return view('peminjam.cetak',['pinjam' => $pinjam]);
    }
}
