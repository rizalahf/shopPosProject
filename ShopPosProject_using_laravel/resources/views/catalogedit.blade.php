@extends('layouts.admin')
@section ('header', 'Catalog')

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('assets/assets/extra-libs/multicheck/multicheck.css')}}">
<link href="{{asset('assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link href="{{asset('assets/dist/css/style.min.css')}}" rel="stylesheet">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/fontawesome-free/css/all.min.js')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.js')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/toastr/toastr.min.js')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.js')}}">

  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('content')

<center>
<div class="body" style="width: 800px;">
<div class="card">
      <form class="form-horizontal" method="post" action="{{url('catalog/'.$catalog->id)}}" autocomplete="off">
        @csrf
        {{method_field('PUT')}}
        
          <div class="card-body">
              <h4 class="card-title">Edit Catalog</h4>
              <div class="form-group row">
                  <label for="fname"
                      class="col-sm-3 text-end control-label col-form-label">Catalog Name</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" value="{{$catalog->catalog_name}}" name="catalog_name"
                          placeholder="New Catalog Name Here">
                  </div>
              </div>
          
         </div>
         <div>
          @csrf
             <button type="submit" class="btn btn-primary">Update</button>
         </div>
     </form>
</div>
</div>
</center>

@endsection

