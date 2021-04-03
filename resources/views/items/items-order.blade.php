@extends('layouts.app')
@section('title', 'Order Item')
@section('content')
<div class="content-wrapper" style="min-height: 1260.4px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Item</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Order Item</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
<section class="content">
  <form method="POST" action="{{route('order_item')}}">
  @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Place Order for Customer</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Item Name</label>
              <select class="form-control select2" name="ItemId" id="ItemId"  placeholder="Please select Item">
                @foreach ($items as $item)
                  <option value="{{ $item->id }}"
                  @if ($item->id == old('ItemId', $item->id))
                      selected="selected"
                  @endif
                  >{{ $item->name." - ".$item->brand." - ".$item->model." - ".$item->color}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="inputSellPrice" class="text-success">Selling Price</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input type="text" id="SellPrice" name="SellPrice" class="form-control SellPrice">
              </div>
            </div>
            <div class="form-group">
              <label for="inputQuantity">Quantity</label>
              <input type="number" name="Quantity" id="Quantity" class="form-control" min="0" required>
              <h6 class="small text-primary">Available : <span id="available"></span></h6>
            </div>
            <div class="form-group">
              <label for="inputTotalPrice" class="text-warning">Total Price</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="text" id="TotalPrice" name="TotalPrice" class="form-control TotalPrice" readonly>
                </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Receipient</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="inputModel">Receipient Name</label>
              <input type="text" name="ReceipientName" class="form-control" placeholder="Exp: Fizee">
            </div>
            <div class="form-group">
              <label>Phone Number:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" name="PhoneNo" class="form-control" 
                      data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
              </div>
            </div>
            <div class="form-group">
              <label for="inputReceipDetail">Receipient details</label>
              <textarea id="ReceipDetail" name="ReceipDetail" class="form-control" rows="2"></textarea>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    </div>
  </form>
</section>

@endsection

@push('meta')
 <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@push('after-script')

<script type='text/javascript'>

  function displayVals() {
      var val = $("#ItemId").val();
       console.log(val);
      // $("#SellPrice").val() = val;
       fetchRecords(val);
  };

  $( "select" ).change( displayVals );
  displayVals();

 function fetchRecords(id){
  console.log("inside fetch");
  
  $.ajax({
    url: 'getSellPriceDesc/'+id,
    type: 'GET',
    dataType: 'text',
    success: function(response){
          var myObj = JSON.parse(response);
          console.log(myObj.data);
          document.getElementById("SellPrice").value = myObj.data.selling_price;
          $("#available").text(myObj.data.quantity);

        }
    });
  }


</script>

@endpush


