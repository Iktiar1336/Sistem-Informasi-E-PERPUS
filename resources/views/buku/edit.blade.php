@extends('layouts.side')

@section('title')
    Edit Buku {{$buku->judul}}
@endsection

@section('content')
<!-- DataTales Example -->
<div class="page-header">
    <h3 class="page-title"> Buku </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/route">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/admin/buku">Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title"><center>Update Buku {{$buku->judul}}</center></h4>
        <a href="/admin/buku" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
        <br><br>
        <form id="insert" action="/admin/buku/update/{{$buku->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Judul </label>
                        <input type="text" name="judul" required value="{{$buku->judul}}" class="form-control text-white" placeholder="Judul Buku ...">
                        @if($errors->has('judul'))
                            <div class="text-danger">
                                {{ $errors->first('judul')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori </label>
                        <select class="form-control text-white" name="kategori" id="kategori">
                            <option value="{{$buku->kategori}}">{{$buku->kategori}}</option>
                            @foreach ($kategori as $k)
                                <option value="{{$k->nama}}">{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis </label>
                        <input type="text" name="penulis" required class="form-control text-white" value="{{$buku->penulis}}" placeholder="Penulis Buku ...">
                        @if($errors->has('penulis'))
                            <div class="text-danger">
                                {{ $errors->first('penulis')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit </label>
                        <input type="text" name="penerbit" required class="form-control text-white" value="{{$buku->penerbit}}" placeholder="Penerbit Buku ...">
                        @if($errors->has('penerbit'))
                            <div class="text-danger">
                                {{ $errors->first('penerbit')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tebal">Tebal </label>
                        <input type="number" name="tebal" required class="form-control text-white" value="{{$buku->tebal}}" placeholder="tebal Buku ...">
                        @if($errors->has('tebal'))
                            <div class="text-danger">
                                {{ $errors->first('tebal')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit </label>
                        <input type="date" name="tahun_terbit" required class="form-control text-white" value="{{$buku->tahun_terbit}}" placeholder="Tahun Terbit Buku ...">
                        @if($errors->has('tahun_terbit'))
                            <div class="text-danger">
                                {{ $errors->first('tahun_terbit')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Buku </label>
                        <input type="number" name="jumlah" required class="form-control text-white" value="{{$buku->jumlah}}" placeholder="Jumlah Buku ...">
                        @if($errors->has('jumlah'))
                            <div class="text-danger">
                                {{ $errors->first('jumlah')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Buku </label>
                        <input type="file" name="gambar" required value="{{$buku->gambar}}" class="form-control text-white" placeholder="Gambar Buku ...">
                        @if($errors->has('gambar'))
                            <div class="text-danger">
                                {{ $errors->first('gambar')}}
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