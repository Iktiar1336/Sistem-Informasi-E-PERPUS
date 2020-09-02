@extends('layouts.side')

@section('title')
    Daftar List User
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="page-header">
  <h3 class="page-title"> User </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/petugas/route">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
  </nav>
</div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
          
        <div class="card-body">
          <h4 class="m-0 font-weight-bold text-white"><center>Daftar List User</center></h4>
          <div class="table-responsive">
            <table class="table table-bordered text-center text-white" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="color: white">Nip</th>
                  <th style="color: white">Username</th>
                  <th style="color: white">Email</th>
                  <th style="color: white">No Hp</th>
                  <th style="color: white">Level</th>
                  <th style="color: white">Status</th>
                  <th style="color: white">Foto</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{$item->nip}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->telp}}</td>
                    <td>
                        @if ($item->is_admin = $item->is_admin)
                            <h5><span class="badge badge-outline-success">Admin</span></h5>
                        @else
                            <h5><span class="badge badge-outline-danger">Petugas</span></h5>
                        @endif
                    </td>
                    <td>@if(Cache::has('user-is-online-' . $item->id))
                            <span class="text-success">Online</span>
                        @else
                            <span class="text-secondary">{{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
                        @endif
                    </td>
                    <td><img src="{{$item->getAvatar()}}" style="width:40px; height:40px;" alt=""></td>
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