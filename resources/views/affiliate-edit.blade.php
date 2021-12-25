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
            <span class="caption-subject font-dark sbold uppercase">Affiliate</span>
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
          <form role="form" class="form-horizontal" method="post" action="{{ route('affiliate-update') }}">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-3 control-label">Name</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Name" class="form-control" name="name" value="{{ $member->name }}" disabled="" >
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
  
              <div class="form-group">
                <label class="col-md-3 control-label">Phone</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Phone" class="form-control" name="phone" value="{{ $affiliate->phone }}" >
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
  
              <div class="form-group">
                <label class="col-md-3 control-label">Address Line 1</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Line 1" class="form-control" name="address1" value="{{ $affiliate->address1 }}">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
  
              <div class="form-group">
                <label class="col-md-3 control-label">Address 2</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Line 2" class="form-control" name="address2" value="{{ $affiliate->address2 }}">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
  
              <div class="row">
                <div class="col-md-6">
      
                  <div class="form-group">
                    <label class="col-md-6 control-label">City</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="City" class="form-control input-inline input-medium" name="city" value="{{ $affiliate->city }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
      
                  <div class="form-group">
                    <label class="col-md-6 control-label">State</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="State" class="form-control input-inline input-medium" name="state" value="{{ $affiliate->state }}">
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
                      <input type="text" placeholder="Zipcode" class="form-control input-inline input-medium" name="zip_code" value="{{ $affiliate->zip_code }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
      
                  <div class="form-group">
                    <label class="col-md-6 control-label">Country</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Country" class="form-control input-inline input-medium" name="country" value="{{ $affiliate->country }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
  
  
  
  
  
              <div class="form-group">
                <label class="col-md-3 control-label">Affiliate Key</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Affiliate Key" class="form-control" name="aff_key" value="{{ $affiliate->aff_key }}" >
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              
              
              
              
              
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <input type="hidden" name="id" value="{{ $affiliate->id }}">
                    <input type="hidden" name="user_id" value="{{ $affiliate->user_id }}">
                    
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

