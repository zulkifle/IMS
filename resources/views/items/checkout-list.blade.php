@extends('layouts.app')
@section('title', 'Check out list')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Check out list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Check out list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of check out items</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Recipient Name</th>
                    <th>Tel No</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($ListofItems as $item => $value)
                    <tr>
                        <td>{{$ListofItems->firstItem()+$item}}</td>
                        <td>{{$value->recipientName}}</td>
                        <td>{{$value->telNo}}</td>
                        <td>{{$value->model}}</td>
                        <td>{{$value->brand}}</td>
                        <td>{{$value->color}}</td> 
                        <td>{{$value->quantity}}</td>
                        <td>
                            <a href="{{route('view_detail', $value->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-folder">
                            </i> View</a>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{$ListofItems->links()}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@push('page-script')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@endpush
  
  <!-- /.content-wrapper -->

@push('after-script')
<script>
$(".swal-confirm").click(function(e){
    e.preventDefault();
    id = e.target.dataset.id;
    Swal.fire({
    title: 'Are you sure?',
    text: 'You will not be able to recover this data record!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, keep it'
    }).then((result) => {
    if (result.value) {
        // Swal.fire(
        // 'Deleted!',
        // 'Your record has been deleted',
        // 'success'
        // )
        $(`#delete${id}`).submit();
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
        'Cancelled',
        'Your record was not deleted : )',
        'error'
        )
    }
    })
});

// Swal.fire({
//     title: 'Are you sure?',
//     text: "You won't be able to revert this!",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, delete it!'
//     }).then(function(result) => {
//     if (result) {
//         Swal.fire({
//         'Deleted!',
//         'Your file has been deleted.',
//         'success',
//         }).then(function(){
//     }); 
//     }else{
//         Swal.fire("Your file was not deleted");
//     }
//     })
</script>

@endpush
  {{-- <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script> --}}
  
@endsection