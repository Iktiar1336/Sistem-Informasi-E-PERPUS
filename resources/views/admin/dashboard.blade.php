@extends('layouts.side')

@section('title')
    Dashboard Admin
@endsection

@section('content')

  <div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{DB::table('buku')->count()}}</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-dark ">
                  <i class="icon-lg mdi mdi-book text-primary ml-auto"></i>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Jumlah Buku</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{DB::table('kategori')->count()}}</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-dark">
                  <i class="icon-lg mdi mdi-drag text-primary ml-auto"></i>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Jumlah Kategori</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{DB::table('users')->count()}}</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-dark">
                  <i class="icon-lg mdi mdi-account text-primary ml-auto"></i>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Jumlah User</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">{{DB::table('peminjam')->count()}}</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-dark ">
                <i class="icon-lg mdi mdi-bookmark-outline text-primary ml-auto"></i>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Jumlah Peminjam</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Peminjam</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th style="color: white">Kode</th>
                  <th style="color: white">Nama Buku</th>
                  <th style="color: white">Nama Peminjam</th>
                  <th style="color: white">Nama Petugas</th>
                  <th style="color: white">Tgl Pinjam</th>
                  <th style="color: white">Waktu Pinjam</th>
                  <th style="color: white">Tgl Pengembalian</th>
                  <th style="color: white">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pinjam as $item)
                <?php 
                  $waktu = date('yy-d-m')
                ?>
                <tr>
                    <td>{{$item->kode}}</td>
                    <td>{{$item->nama_buku}}</td>
                    <td>{{$item->nama_peminjam}}</td>
                    <td>{{$item->nama_petugas}}</td>
                    <td>{{$item->tgl_pinjam}}</td>
                    <td>{{$item->waktu_pinjam}}</td>
                    <td>{{$item->tgl_pengembalian}}</td>
                    <td>
                        @if ($item->status = $item->status)
                            @if ($item->tgl_pinjam = $item->tgl_pengembalian)
                                <h5 class="badge badge-outline-success">Di Kembalikan</h5>
                            @elseif ($item->tgl_pinjam == $item->tgl_pinjam)
                                <h5 class="badge badge-outline-warning">Di Pinjam</h5>
                            @elseif ($wa)
                                <h5 class="badge badge-outline-danger">Belum Di Kembalikan</h5>
                            @endif
                        @endif
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection

@section('js')
@if (session('welcome'))
<script>
        swal("Welcome Back {{ Auth::user()->name }} }}",{
        });
</script>
@endif
@endsection

