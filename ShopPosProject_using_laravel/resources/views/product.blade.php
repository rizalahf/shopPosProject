@extends('layouts.admin')
@section ('header', 'Product')

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
<div id="controller">

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="margin-bottom: 10px; color: white;">
    Create New Product
    </button>
                       <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product Datatable</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Catalog ID</th>
                                                <th>Suplier ID</th>
                                                <th>Status</th>
                                                <th>Create At</th>
                                                <th>Update At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $key => $product)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$product -> product_name}}</td>
                                                <td>{{$product -> price}}</td>
                                                <td>{{$product -> qty}}</td>
                                                <td>{{$product -> catalog_id}}</td>
                                                <td>{{$product -> suplier_id}}</td>
                                                <td>{{$product -> status}}</td>
                                                <td>{{$product -> created_at}}</td>
                                                <td>{{$product -> updated_at}}</td>
                                                <td class="text-center"> <a href="{{url('product/'.$product->id.'/edit')}}" type="button" class="btn btn-warning">Edit</a> 
                                                     <form action="{{url('product', ['id' => $product->id])}}" method="post">
                                                        <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are You Sure?')">
                                                        @method('delete')
                                                        @csrf
                                                     </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>

        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @csrf
            
                      <div class="card">
                            <form class="form-horizontal" method="post" action="{{url('product')}}" autocomplete="off">
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="" name="product_name"
                                        placeholder="Product Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="" name="price"
                                        placeholder="Price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label">Qty</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="" name="qty"
                                        placeholder="Qty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname"
                                   class="col-sm-3 text-end control-label col-form-label">Catalog ID</label>
                                <div class="col-sm-9">
                                    <select name="catalog_id" class="form-control row">
                                        @foreach($catalogs as $catalog)
                                        <option :selected="product.catalog_id == {{$catalog->id}}" name="catalog_id" value="{{$catalog->id}}">{{$catalog->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname"
                                   class="col-sm-3 text-end control-label col-form-label">Suplier ID</label>
                                <div class="col-sm-9">
                                    <select name="suplier_id" class="form-control row">
                                        @foreach($supliers as $suplier)
                                        <option :selected="product.suplier_id == {{$suplier->id}}" name="suplier_id" value="{{$suplier->id}}">{{$suplier->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname"
                                    class="col-sm-3 text-end control-label col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="" name="status"
                                        placeholder="Status">
                                </div>
                            </div>
                                
                               </div>
                               <div class="modal-footer justify-content-between">
                                @csrf
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Save changes</button>
                               </div>
                           </form>
                        </div>

            </div>
            
         </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</div>

@endsection


@section('js')

    <!-- this page js -->
    <script src="{{asset('assets/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('assets/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('assets/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

<script src="{{asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('assets/adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('assets/adminlte/plugins/toastr/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/adminlte/dist/js/demo.js')}}"></script>


@endsection