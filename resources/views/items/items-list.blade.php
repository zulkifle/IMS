@extends('layouts.app')
@section('title', 'List of Item')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Items</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">List of Items</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Add item button -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        <a href="{{route('add_item')}}" class="btn btn-block bg-gradient-info"><i class="far fa-edit"></i> Add Item</a>
                    </div>
                 </div>
                 <div class="col-sm-2 col-md-2 col-lg-2 ml-auto mr-3">
                  <div id="table_item_filter" class="dataTables_filter float-sm-right">
                    <label>Search:<input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                  </div>
                </div>
           </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of registered item</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table_item" class="table table-bordered table-striped table-sm item-table">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($ListofItems as $item => $value)
                    <tr>
                        <td>{{$ListofItems->firstItem()+$item}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->model}}</td>
                        <td>{{$value->brand}}</td>
                        <td>{{$value->color}}</td>
                        <td>{{$value->selling_price}}</td> 
                        <td>{{$value->quantity}}</td>
                        <td>
                          <a class="btn btn-info btn-sm" href="{{route('edit_item', $value->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                          </a>
                            {{-- <a href="{{route('edit_item', $value->id)}}" class="badge badge-pill badge-primary">Edit</a> --}}

                          <a href="#" data-id="{{$value->id}}" class="btn btn-danger btn-sm swal-confirm">
                            <form action="{{route('delete_item', $value->id)}}" id="delete{{$value->id}}" method="POST">
                              @csrf
                              @method('delete')
                              </form>
                              <i class="fas fa-trash"></i>
                            Delete
                          </a>
                            {{-- <a href="#" data-id="{{$value->id}}" class="badge badge-pill badge-danger swal-confirm">
                                <form action="{{route('delete_item', $value->id)}}" id="delete{{$value->id}}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                                Delete</a> --}}
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{-- {{$ListofItems->links('pagination::Bootstrap-4')}} --}}
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
    $(document).ready(function(){
      $("#search").keyup(function(){
        search_table($(this).val());
      });

      function search_table(value){
        $('#table_item tbody tr').each(function(){
          var found = 'false';
          $(this).each(function(){
            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
            {
              found = 'true';
            }
          });

          if(found == 'true'){
            $(this).show();
          }
          else{
            $(this).hide();
          }
        });
      }

    });
  </script>
@endpush

@endsection