@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')

<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('content')

<div id="controller">

<div class="card">
<div class="card-header">

<a href="#" class="btn btn-sm btn-primary pull right" @click="addData()" >Create New Publisher</a>
</div>

<div class="card-body">
 <table id="datatable" class="table-bordered table-striped">
     <thead>
     <tr>
     <th style="width: 10px">No</th>
     <th class='text-center' >Name</th>
     <th class='text-center' >Phone Number</th>
     <th class='text-center'>Address</th>
     <th class='text-center'>Email</th>
     <th class='text-center'>Create At</th>
     <th class='text-center'>Action</th>
     </tr>
     </thead>
 </table>
</div>

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl"  autocomplete="off">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @csrf

                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Author Name" :value="data.name" required="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email" :value="data.email" required="">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number" :value="data.phone_number" required="">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="addres" placeholder="Enter Address" :value="data.addres" required="">
                </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div>

@endsection

@section('js')

<!-- TABLE plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script type="text/javascript">
  $(function () {
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>

<script type="text/javascript">

    var actionUrl = '{{url('publishers')}}';
    var apiUrl = '{{url('api/publishers')}}';

    var columns = [
      {data: 'DT_RowIndex', class: 'text-center', orderable: true },
      {data: 'name', calss: 'text_center', orderable: true},
      {data: 'phone_number', calss: 'text_center', orderable: true},
      {data: 'addres', calss: 'text_center', orderable: true},
      {data: 'email', calss: 'text_center', orderable: true},
      {data: 'date', calss: 'text_center', orderable: true},
      {render: function (index, row, data, meta){
             return `
             <a href="#" class="btn btn-warning brn-sm" onclick="controller.editData(event, ${meta.row})"> 
                 Edit 
             </a>

             <a class="btn btn-danger brn-sm" onclick="controller.deleteData(event, ${data.id})"> 
                 Delete
             </a> `;
        
      }, orderable: false, width: '345px', class: 'text-center'},
    ];

</script>

<script src="{{asset('js/data.js')}}"></script>


<!-- CRUD JS
<script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data: {

            data : {},
            actionUrl : '{{ url('publishers') }}', 
            editStatus : false
        }, 
        mounted: function () {
            
        }, 
        methods: {

            addData() {
                this.data = {};
                this.actionUrl = '{{ url('publishers') }}';
                this.editStatus = false;
                $('#modal-default').modal();

            },
            editData(data) {
                this.data = data;
                this.actionUrl = '{{ url('publishers') }}'+'/'+data.id;
                this.editStatus = true;
                $('#modal-default').modal();

            },
            deleteData(id) {

                this.actionUrl = '{{ url('publishers') }}'+'/'+id;
                if (confirm("Are You Sure?")) {
                    axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                        location.reload();
                    }); 
                }


            }
        }
    });
 </script> -->


@endsection