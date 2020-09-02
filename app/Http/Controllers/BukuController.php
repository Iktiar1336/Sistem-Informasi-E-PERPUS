<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use Illuminate\Support\Str;
use App\Kategori;
use Illuminate\Support\Facades\DB;
use App\Imports\BukuImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('buku.index',['buku' => $buku , 'kategori' => $kategori]);
    }

    public function home()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('buku.home',['buku' => $buku , 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required','unique:buku',
            'penulis' => 'required', 'max:255',
            'penerbit' => 'required', 'max:255',
            'tebal' => 'required', 'max:255',
            'jumlah' => 'required', 'max:255',
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kode = new Buku;
        if ( $latestkode = Buku::orderBy('created_at','DESC')->first()) {
            $kode->kode = 'BK-'.str_pad($latestkode->id + 1, 3, "0", STR_PAD_LEFT);
        }else {
            $kode->kode = 'BK-'.str_pad( + 1, 3, "0", STR_PAD_LEFT);
        }
        $kode->judul = $request->judul;
        $kode->kategori = $request->kategori;
        $kode->penulis = $request->penulis;
        $kode->penerbit = $request->penerbit;
        $kode->tebal = $request->tebal;
        $kode->tahun_terbit = $request->tahun_terbit;
        $kode->jumlah = $request->jumlah;
        if($request->hasfile(['gambar'])){
            $request->file(['gambar'])->move('gambar/',$request->file(['gambar'])->getClientOriginalName());
            $kode->gambar = $request->file(['gambar'])->getClientOriginalName();
        }
        $kode->save();
        return redirect()->back()->with('insert',"Buku Berhasil Di Tambah");
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
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('buku.edit',['buku' => $buku , 'kategori' => $kategori]);
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
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required', 'max:255',
            'penerbit' => 'required', 'max:255',
            'tebal' => 'required', 'max:255',
            'jumlah' => 'required', 'max:255',
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $buku = Buku::find($id);
        $buku->update($request->all());
        if($request->hasfile(['gambar'])){
            $request->file(['gambar'])->move('gambar/',$request->file(['gambar'])->getClientOriginalName());
            $buku->gambar = $request->file(['gambar'])->getClientOriginalName();
            $buku->save();
        }
        return redirect('/admin/buku')->with('update',"Buku Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku)  {
            if ($buku->delete()){

            DB::statement('ALTER TABLE buku AUTO_INCREMENT = '.(count(Buku::all())+1).';');

            return redirect()->back()->with('delete',"Buku Berhasil Di Hapus");
            }   
        }
        
    }

    public function import(Request $request)
    {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('import_buku',$nama_file);
 
        // import data
        Excel::import(new BukuImport, public_path('/import_buku/'.$nama_file));
        return redirect()->back()->with('import',"Buku Berhasil Di Import");
    }
}
