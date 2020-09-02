@extends('layouts.side')

@section('title')
    Pengembalian Buku {{$pinjam->nama_buku}}
@endsection

@section('content')
<!-- DataTales Example -->
<div class="page-header">
    <h3 class="page-title"> Buku </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/route">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/buku">Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
      </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title"><center>Pengembalian Buku {{$pinjam->nama_buku}}</center></h4>
        <a href="/buku" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
        <br><br>
        <form id="insert" action="/buku/kembali/store/{{$pinjam->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Nama Buku</label>
                        <input type="text" name="nama_buku" required readonly value="{{$pinjam->nama_buku}}" class="form-control bg-dark text-white" placeholder="Judul Buku ...">
                        @if($errors->has('nama_buku'))
                            <div class="text-danger">
                                {{ $errors->first('nama_buku')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" required value="{{$pinjam->nama_peminjam}}" readonly class="form-control bg-dark text-whute" placeholder="Nama Peminjam ...">
                        @if($errors->has('nama_peminjam'))
                            <div class="text-danger">
                                {{ $errors->first('nama_peminjam')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="hp">No Hp Peminjam</label>
                        <input type="number" name="no_hp" required readonly value="{{$pinjam->no_hp}}" class="form-control bg-dark text-white" placeholder="No Hp Peminjam ...">
                        @if($errors->has('no_hp'))
                            <div class="text-danger">
                                {{ $errors->first('no_hp')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" required readonly value="{{$pinjam->nama_petugas}}" class="form-control bg-dark text-white" placeholder="Waktu Pinjam ...">
                        @if($errors->has('nama_petugas'))
                            <div class="text-danger">
                                {{ $errors->first('nama_petugas')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat">Alamat Peminjam</label>
                        <input type="text" name="alamat" required readonly value="{{$pinjam->alamat}}" class="form-control bg-dark text-white" placeholder="Alamat Peminjam ...">
                        @if($errors->has('alamat'))
                            <div class="text-danger">
                                {{ $errors->first('alamat')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="tgl">Tgl Pinjam</label>
                        <input type="date" name="tgl_pinjam" required readonly value="{{$pinjam->tgl_pinjam}}" class="form-control bg-dark text-white" placeholder="Tanggal Pinjam ...">
                        @if($errors->has('tgl_pinjam'))
                            <div class="text-danger">
                                {{ $errors->first('tgl_pinjam')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="waktu">Waktu Pinjam</label>
                        <input type="date" name="waktu_pinjam" required readonly value="{{$pinjam->waktu_pinjam}}" class="form-control bg-dark text-white" placeholder="Waktu Pinjam ...">
                        @if($errors->has('waktu_pinjam'))
                            <div class="text-danger">
                                {{ $errors->first('waktu_pinjam')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="tgl_pengembalian">Tgl Pengembalian</label>
                        <input type="date" name="tgl_pengembalian" required class="form-control text-white bg-dark" placeholder="Waktu Pinjam ...">
                        @if($errors->has('tgl_pengembalian'))
                            <div class="text-danger">
                                {{ $errors->first('tgl_pengembalian')}}
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary col simpan" value="Kembalikan">
            </div>
        </form>
    </div>
</div>
@endsection