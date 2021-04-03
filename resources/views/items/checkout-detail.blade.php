@extends('layouts.app')
@section('title', 'Checkout details')
@section('content')
<div class="content-wrapper" style="min-height: 1260.4px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Checkout details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Checkout details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
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
                <label for="inputName">Recipient Name</label>
                <input type="text" name="RecipientName" class="form-control" value="{{ $item->recipientName}}" readonly>
              </div>
              <div class="form-group">
                <label for="inputTelNo">Tel. No</label>
                <input type="text" name="TelNo" class="form-control" value="{{ $item->telNo}}" readonly>
              </div>
              <div class="form-group">
                <label for="inputRecipientDetail">Recipient details</label>
                <textarea id="RecipientDetail" name="RecipientDetail" class="form-control" rows="2" placeholder="{{ $item->recipientDetails}}" readonly></textarea>
              </div>
              <div class="form-group">
                <label for="inputItemName">Item Name</label>
                <input type="text" name="ItemName" value="{{ $item->itemName}}" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="inputBrand">Brand</label>
                <input type="text" name="Brand" value="{{ $item->brand}}" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="inputModel">Model</label>
                <input type="text" name="Model" value="{{ $item->model}}" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="inputColor">Color</label>
                <input type="text" name="Color" value="{{ $item->color}}" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="inputQuantity">Quantity</label>
                <input type="text" name="Quantity" class="form-control" value="{{ $item->quantity}}" readonly>
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
                <label for="inputSellPrice" class="text-success">Item Price</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="text" id="SellPrice" name="SellPrice" class="form-control" value="{{ $item->selling_price}}" readonly>
                </div>
              </div>
               <div class="form-group">
                <label for="inputCostPrice" class="text-danger">Total Price</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="text" id="TotalPrice" name="TotalPrice" class="form-control" value="" readonly>
                </div>
              </div>
              <div class="row">
                <small>Item Order at  : <cite title="Source Title">{{ $item->created_at}}</cite></small>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <div class="row text-center mt-5 mb-3">
            <div class="col-9">
              <a href="{{ route('checkout_list_item')}}" class="btn btn-secondary">Back</a>
            </div>
          </div>


        </div>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


