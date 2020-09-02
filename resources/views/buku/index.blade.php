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
            <li class="breadcrumb-item"><a href="/admin/route">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buku</li>
          </ol>
        </nav>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="m-0 font-weight-bold text-white mb-3 card-title"><center>Daftar List Buku</center></h4>
            <div class="row">
                <div class="col-10">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buku">
                        <i class="mdi mdi-plus"></i> Tambah Buku
                    </button>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#import">
                        <i class="mdi mdi-upload"></i> Import File
                    </button>
                </div>
            </div>
            <br>
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
                        <a href="/admin/buku/edit/{{ $item->id }}" class="btn btn-warning"><i class="mdi mdi-lead-pencil"></i></a>
                        <br><br>
                        <a href="/admin/buku/hapus/{{ $item->id }}" class="btn btn-danger delete"><i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
    <!-- Modal -->
        <div class="modal fade" id="buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><center>Tambah Buku</center></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="insert" action="/admin/buku/tambah" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="judul">Judul </label>
                            <input type="text" name="judul" required class="form-control text-white" placeholder="Judul Buku ...">
                            @if($errors->has('judul'))
                                <div class="text-danger">
                                    {{ $errors->first('judul')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori </label>
                            <select class="form-control text-white" name="kategori" id="kategori">
                                @foreach ($kategori as $k)
                                    <option value="{{$k->nama}}">{{$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis </label>
                            <input type="text" name="penulis" required class="form-control text-white" placeholder="Penulis Buku ...">
                            @if($errors->has('penulis'))
                                <div class="text-danger">
                                    {{ $errors->first('penulis')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit </label>
                            <input type="text" name="penerbit" required class="form-control text-white" placeholder="Penerbit Buku ...">
                            @if($errors->has('penerbit'))
                                <div class="text-danger">
                                    {{ $errors->first('penerbit')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tebal">Tebal </label>
                            <input type="number" name="tebal" required class="form-control text-white" placeholder="tebal Buku ...">
                            @if($errors->has('tebal'))
                                <div class="text-danger">
                                    {{ $errors->first('tebal')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit </label>
                            <input type="text" name="tahun_terbit" required class="form-control text-white" placeholder="Tahun Terbit Buku ...">
                            @if($errors->has('tahun_terbit'))
                                <div class="text-danger">
                                    {{ $errors->first('tahun_terbit')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Buku </label>
                            <input type="number" name="jumlah" required class="form-control text-white" placeholder="Jumlah Buku ...">
                            @if($errors->has('jumlah'))
                                <div class="text-danger">
                                    {{ $errors->first('jumlah')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Buku </label>
                            <input type="file" name="gambar" required class="form-control text-white" placeholder="Gambar Buku ...">
                            @if($errors->has('gambar'))
                                <div class="text-danger">
                                    {{ $errors->first('gambar')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success col simpan" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    <!-- Modal -->
        <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/buku/import/excel" enctype="multipart/form-data">
                        {{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success col" value="Import">
                            </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
@endsection

@section('js')
      <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $('.delete').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Buku Ini Akan Di Hapus Permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              window.location.href = url;
          }
          else {
            swal("Buku Batal Di Hapus!",{
                icon: "info"
            });
        }
      });
  });
  </script>
@if (session('delete'))
<script>
        swal("{{ session('delete') }}",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

@if (isset($errors) && $errors->any())
    @foreach ($errors->all() as $error)
        <script>
            swal("{{ $error }}",{
            title: "Gagal",
            icon: "error",
        });
        </script>
    @endforeach
@endif 

@if (session('update'))
<script>
        swal("{{ session('update') }}",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

@if (session('insert'))
<script>
        swal("{{ session('insert') }}",{
            title: "Sukses",
            icon: "success",
        });
</script>
@endif

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection