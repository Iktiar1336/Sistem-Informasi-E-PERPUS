@extends('layouts.side')

@section('title')
    Edit Kategori {{$kategori->nama}}
@endsection

@section('content')
<!-- DataTales Example -->
<div class="page-header">
    <h3 class="page-title"> Kategori </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/route">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/admin/kategori">Kategori</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title"><center>Update Kategori {{$kategori->nama}}</center></h4>
        <a href="/admin/buku" class="btn btn-primary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
        <br><br>
        <form id="insert" action="/admin/kategori/update/{{$kategori->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="form-group">
                <label for="nama">Nama </label>
                <input type="text" name="nama" required class="form-control text-white" value="{{$kategori->nama}}" placeholder="Nama kategori ...">
                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary col simpan" value="Simpan">
            </div>
        </form>
    </div>
</div>
@endsection
