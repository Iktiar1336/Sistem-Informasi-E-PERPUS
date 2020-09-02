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
            <div class="row">
                <div class="col-10">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buku">
                        <i class="mdi mdi-plus"></i> Tambah Kategori
                    </button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="color: white;">Nama </th>
                      <th style="color: white;">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kategori as $item)
                    <tr>
                        <td>{{$item->nama}}</td>
                        <td class="text-center">
                            <a href="/admin/kategori/edit/{{ $item->id }}" class="btn btn-warning"><i class="mdi mdi-lead-pencil"></i></a>
                            <a href="/admin/kategori/hapus/{{ $item->id }}" class="btn btn-danger delete"><i class="mdi mdi-delete"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="tambah" action="/admin/kategori/tambah" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama </label>
                            <input type="text" name="nama" required class="form-control text-white" placeholder="Nama Kategori ...">
                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
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
        title: "Are you sure?",
        text: "Kategori Ini Akan Di Hapus Permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
              window.location.href = url;
          }
          else {
            swal("Kategori Batal Di Hapus!",{
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