@extends('layouts.side')

@section('title')
    Pinjam Buku {{$buku->judul}}
@endsection

@section('content')
<!-- DataTales Example -->
<div class="page-header">
    <h3 class="page-title"> Buku </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/route">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/buku">Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pinjam</li>
      </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title"><center>Pinjam Buku {{$buku->judul}}</center></h4>
        <a href="/admin/buku" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
        <br><br>
        <form id="insert" action="/petugas/buku/pinjam/" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Nama Buku</label>
                        <input type="text" name="judul" required value="{{$buku->judul}}" class="form-control text-white" placeholder="Judul Buku ...">
                        @if($errors->has('judul'))
                            <div class="text-danger">
                                {{ $errors->first('judul')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" required class="form-control text-white" placeholder="Nama Peminjam ...">
                        @if($errors->has('nama_peminjam'))
                            <div class="text-danger">
                                {{ $errors->first('nama_peminjam')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="hp">No Hp Peminjam</label>
                        <input type="number" name="hp" required class="form-control text-white" placeholder="No Hp Peminjam ...">
                        @if($errors->has('no_hp'))
                            <div class="text-danger">
                                {{ $errors->first('no_hp')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat">Alamat Peminjam</label>
                        <input type="text" name="alamat" required class="form-control text-white" placeholder="Alamat Peminjam ...">
                        @if($errors->has('alamat'))
                            <div class="text-danger">
                                {{ $errors->first('alamat')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="tgl">Tgl Pinjam</label>
                        <input type="date" name="tgl" required class="form-control text-white" placeholder="Tanggal Pinjam ...">
                        @if($errors->has('tgl_pinjam'))
                            <div class="text-danger">
                                {{ $errors->first('tgl_pinjam')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="waktu">Waktu Pinjam</label>
                        <input type="date" name="waktu" required class="form-control text-white" placeholder="Waktu Pinjam ...">
                        @if($errors->has('waktu_pinjam'))
                            <div class="text-danger">
                                {{ $errors->first('waktu_pinjam')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="petugas" required value="{{ Auth::user()->username }}" class="form-control text-white" placeholder="Waktu Pinjam ...">
                        @if($errors->has('nama_peminjam'))
                            <div class="text-danger">
                                {{ $errors->first('nama_peminjam')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary col simpan" value="Simpan">
            </div>
        </form>
    </div>
</div>
@endsection