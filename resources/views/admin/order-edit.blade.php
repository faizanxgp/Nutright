@extends('layouts.app')

@section('pageHeading')
  Admin Dashboard
@endsection

@section('content')
  
  <div class="row">
    <div class="col-md-12 ">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <style>
        .help-block, .help-inline { display: none; }
      </style>
      
      <div class="portlet light bordered">
        @if(Session::has('flash_message'))
          <div class="alert alert-success">
            {{ Session::get('flash_message') }}
          </div>
        @endif
        <div class="portlet-title">
          <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">Order</span>
          </div>
          <div class="actions">
            <div data-toggle="buttons" class="btn-group btn-group-devided">
              <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                <input type="radio" id="option1" class="toggle" name="options">Actions</label>
              <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                <input type="radio" id="option2" class="toggle" name="options">Settings</label>
            </div>
          </div>
        </div>
        <div class="portlet-body form">
          <form role="form" class="form-horizontal" method="post" action="{{ route('order-update') }}">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-3 control-label">Affiliate</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Affiliate" class="form-control" name="affiliate" value="{{ $order->affiliate }}" readonly="">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">First Name</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="First Name" class="form-control input-inline input-medium" name="first_name" value="{{ $order->first_name }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Last Name</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Last Name" class="form-control input-inline input-medium" name="last_name" value="{{ $order->last_name }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Email</label>
                    <div class="col-md-6">
                      <input type="email" placeholder="Email" class="form-control input-inline input-medium" name="email" value="{{ $order->email }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Phone</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Phone" class="form-control input-inline input-medium" name="phone" value="{{ $order->phone }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Address Line 1</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Line 1" class="form-control" name="address1" value="{{ $order->address1 }}">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Address 2</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Line 2" class="form-control" name="address2" value="{{ $order->address2 }}">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">City</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="City" class="form-control input-inline input-medium" name="city" value="{{ $order->city }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">State</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="State" class="form-control input-inline input-medium" name="state" value="{{ $order->state }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Zipcode</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Zipcode" class="form-control input-inline input-medium" name="zip_code" value="{{ $order->zip_code }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Country</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Country" class="form-control input-inline input-medium" name="country" value="{{ $order->country }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Product</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Product" class="form-control input-inline input-medium" name="product" value="{{ $order->product }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Package</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Package" class="form-control input-inline input-medium" name="package" value="{{ $order->package }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Qty</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Qty" class="form-control input-inline input-medium" name="qty" value="{{ $order->qty }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Actual Amount</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Amount" class="form-control input-inline input-medium" name="amount" value="{{ $order->amount }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-md-6">
      
                  <div class="form-group">
                    <label class="col-md-6 control-label">Discount</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Discount" class="form-control input-inline input-medium" name="discount" value="{{ $order->discount }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Shipping</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Shipping" class="form-control input-inline input-medium" name="shipping" value="{{ $order->shipping }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                  
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Order Amount</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Order Amount" class="form-control input-inline input-medium" name="order_amount" value="{{ $order->order_amount }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Coupon</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Coupon" class="form-control input-inline input-medium" name="coupon" value="{{ $order->coupon }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Status</label>
                <div class="col-md-9">
                  {{ Form::select('status', $orderStatus, $order->status, ['class' => 'form-control input-inline input-medium','placeholder' => 'Select...']) }}
                  
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Notes</label>
                <div class="col-md-9">
                  <textarea rows="3" class="form-control" name="notes">{{ $order->notes }}</textarea>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Order Date</label>
                    <div class="col-md-6">
                      {{ $order->created_at }}
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Last updated</label>
                    <div class="col-md-6">
                      {{ $order->updated_at }}
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <button class="btn green" type="submit">Update</button>
                    <button class="btn default" type="button">Cancel</button>
                    {{ csrf_field() }}
                  </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    
    
    </div>
  </div>

@endsection

