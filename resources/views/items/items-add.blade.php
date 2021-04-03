@extends('layouts.app')
@section('title', 'Add Item')
@section('content')
<div class="content-wrapper" style="min-height: 1260.4px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Item</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Add Item</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form method="POST" action="{{route('store_item')}}">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Details</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Item Name</label>
                <input type="text" name="ItemName" class="form-control" required placeholder="Exp: Helmet">
              </div>
              <div class="form-group">
                <label for="inputModel">Model</label>
                <input type="text" name="Model" class="form-control" placeholder="Exp: SR202">
              </div>
              <div class="form-group">
                <label for="inputBrand">Brand</label>
                <input type="text" name="Brand" class="form-control" placeholder="Exp: KAWASAKI">
              </div>
              <div class="form-group">
                <label for="inputColor">Color</label>
                <input type="text" name="Color" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputQuantity">Quantity</label>
                <input type="number" name="Quantity" class="form-control" min="0" required placeholder="Exp: 10">
              </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="warning" name="warning" value="option1">
                  <label for="warning" class="custom-control-label">Set Minimum value for warning</label>
                </div>
                <div class="form-group">
                  <input type="number" name="Minimum" class="form-control" min="0">
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Price</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
               <div class="form-group">
                <label for="inputCostPrice" class="text-danger">Cost Price</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="number" id="CostPrice" name="CostPrice" class="form-control" placeholder="0" min="0" required step="any">
                </div>
              </div>
              <div class="form-group">
                <label for="inputSellPrice" class="text-success">Selling Price</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="number" id="SellPrice" name="SellPrice" class="form-control" placeholder="0" min="0" required step="any">
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea id="Description" name="Description" class="form-control" rows="4" placeholder="Exp: Anything to describe"></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <div class="row text-center mt-5 mb-3">
            <div class="col-9">
              <a href="{{ route('list_item')}}" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Submit" id="btnSubmit" class="btn btn-success float-right">
            </div>
          </div>


        </div>
      </div>
      
      {{-- <script type="text/javascript">
          $(function () {
              $("#btnSubmit").click(function () {
                  var formData = new FormData();
                  formData.append("PersonId", $("#PersonId").val());
                  formData.append("Name", $("#Name").val());
                  formData.append("Gender", $("#Gender").val());
                  formData.append("City", $("#City").val());
                  $.ajax({
                      url: "/Home/Index",
                      type: 'POST',
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: formData,
                      success: function (response) {
                          alert(response);
                      }
                  });
              });
          });
      </script> --}}
    </form>
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


