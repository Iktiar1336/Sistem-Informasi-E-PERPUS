@extends('layouts.side')

@section('css')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('title')
    Data Peminjam
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="page-header">
        <h3 class="page-title"> Peminjam </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/route">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Peminjam</li>
          </ol>
        </nav>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="m-0 font-weight-bold text-white mb-3 card-title"><center>Daftar List Peminjam</center></h4>
          <div class="table-responsive">
            <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="color: white">Kode</th>
                  <th style="color: white">Nama Buku</th>
                  <th style="color: white">Nama Peminjam</th>
                  <th style="color: white">Tgl Pinjam</th>
                  <th style="color: white">Waktu Pinjam</th>
                  <th style="color: white">Tgl Pengembalian</th>
                  <th style="color: white">Status</th>
                  <th style="color: white">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($peminjam as $item)
                <tr>
                    <td>{{$item->kode}}</td>
                    <td>{{$item->nama_buku}}</td>
                    <td>{{$item->nama_peminjam}}</td>
                    <td>{{$item->tgl_pinjam}}</td>
                    <td>{{$item->waktu_pinjam}}</td>
                    <td>{{$item->tgl_pengembalian}}</td>
                    <td>
                        @if ($item->status = $item->status)
                            @if ($item->tgl_pinjam = $item->tgl_pengembalian)
                                <h5 class="badge badge-outline-success">Di Kembalikan</h5>
                            @elseif ($item->tgl_pinjam == $item->tgl_pinjam)
                                <h5 class="badge badge-outline-warning">Di Pinjam</h5>
                            @endif
                        @endif
                    </td>
                    <td>
                      @if ($item->tgl_pinjam = $item->tgl_pengembalian)
                        <a href="/pengembalian/cetak/{{ $item->id }}" target="_BLANK" class="btn btn-success" role="button" aria-disabled="false"><i class="mdi mdi-printer"></i> Cetak</a>
                      @else
                        <a href="/buku/kembalikan/{{ $item->id }}" class="btn btn-warning" role="button" aria-disabled="false"><i class="mdi mdi-bookmark"></i>kembalikan</a>
                      @endif
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
  @if (session('sukses'))
    <script>
            swal("{{ session('sukses') }}",{
                title: "Sukses",
                icon: "success",
            });
    </script>
  @endif
  @if (session('berhasil'))
    <script>
            swal("{{ session('berhasil') }}",{
                title: "Sukses",
                icon: "success",
                text: "Silahkan Cetak Bukti Pengembalian"
            });
    </script>
  @endif
@endsection
