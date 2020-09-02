@extends('layouts.side')

@section('title')
    Daftar List Buku
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <!-- DataTales Example -->
    <div class="page-header">
        <h3 class="page-title"> Buku </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/petugas/route">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buku</li>
          </ol>
        </nav>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="m-0 font-weight-bold text-white mb-3 card-title"><center>Daftar List Buku</center></h4>
          <div class="table-responsive">
            <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="color: white">Kode</th>
                  <th style="color: white">Judul</th>
                  <th style="color: white">Kategori</th>
                  <th style="color: white">Penulis</th>
                  <th style="color: white">Penerbit</th>
                  <th style="color: white">Terbitan</th>
                  <th style="color: white">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($buku as $item)
                <tr>
                    <td>{{$item->kode}}</td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->kategori}}</td>
                    <td>{{$item->penulis}}</td>
                    <td>{{$item->penerbit}}</td>
                    <td>{{$item->tahun_terbit}}</td>
                    <td>
                        <a href="/buku/pinjam/{{ $item->id }}" class="btn btn-warning"><i class="mdi mdi-bookmark-outline"></i></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection

@section('js')
      <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection