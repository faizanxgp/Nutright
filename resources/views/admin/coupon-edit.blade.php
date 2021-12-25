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
            <span class="caption-subject font-dark sbold uppercase">Coupon</span>
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
          <form role="form" class="form-horizontal" method="post" action="{{ route('coupon-update') }}">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-3 control-label">Coupon</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Coupon" class="form-control" name="coupon" value="{{ $coupon->coupon }}">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Affiliate Discount (%)</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Discount %" class="form-control input-inline input-medium" name="affiliate_discount" value="{{ $coupon->affiliate_discount }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Buyer Discount (%)</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Discount %" class="form-control input-inline input-medium" name="buyer_discount" value="{{ $coupon->buyer_discount }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-md-6">
      
                  <div class="form-group">
                    <label class="col-md-6 control-label">Shipping</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Shipping" class="form-control input-inline input-medium" name="shipping" value="{{ $coupon->shipping }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
      
                  <div class="form-group">
                    <label class="col-md-6 control-label">Packages</label>
                    <div class="col-md-6">
                      
  
                      {{ Form::checkbox('package1', '1', (($coupon->package1==1) ? 1 : 0) ) }} Package 1 <br />
                      {{ Form::checkbox('package2', '1', (($coupon->package2==1) ? 1 : 0) ) }} Package 2 <br />
                      {{ Form::checkbox('package3', '1', (($coupon->package3==1) ? 1 : 0) ) }} Package 3 <br />
                      
                      
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Status</label>
                    <div class="col-md-6">
                      {{ Form::checkbox('active', '1', (($coupon->active==1) ? 1 : 0) ) }} Click to make it active<br />
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Affiliate</label>
                    <div class="col-md-6">
                      {{ Form::select('user_id', $users, $coupon->user_id, ['class' => 'form-control input-inline input-medium']) }}
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Lead Date</label>
                    <div class="col-md-6">
                      {{ $coupon->created_at }}
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Last updated</label>
                    <div class="col-md-6">
                      {{ $coupon->updated_at }}
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <input type="hidden" name="id" value="{{ $coupon->id }}">
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

