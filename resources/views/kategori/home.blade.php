@extends('layouts.side')

@section('title')
    Daftar List Kategori
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- DataTales Example -->
<div class="page-header">
    <h3 class="page-title"> Kategori </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/route">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
      </ol>
    </nav>
</div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="m-0 font-weight-bold text-white card-title"><center>Daftar List Kategori</center></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="color: white;">No</th>
                      <th style="color: white;">Nama </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($kategori as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->nama}}</td>
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