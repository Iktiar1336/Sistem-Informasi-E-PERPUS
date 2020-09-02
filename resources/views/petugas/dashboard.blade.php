@extends('layouts.side')

@section('title')
    Dashboard Petugas
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

