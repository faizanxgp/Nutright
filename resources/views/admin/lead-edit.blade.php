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
            <span class="caption-subject font-dark sbold uppercase">Lead</span>
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
          <form role="form" class="form-horizontal" method="post" action="{{ route('lead-update') }}">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-3 control-label">Affiliate</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Affiliate" class="form-control" name="affiliate" value="{{ $lead->affiliate }}" readonly="">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">First Name</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="First Name" class="form-control input-inline input-medium" name="first_name" value="{{ $lead->first_name }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Last Name</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Last Name" class="form-control input-inline input-medium" name="last_name" value="{{ $lead->last_name }}">
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
                      <input type="email" placeholder="Email" class="form-control input-inline input-medium" name="email" value="{{ $lead->email }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Phone</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Phone" class="form-control input-inline input-medium" name="phone" value="{{ $lead->phone }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Address Line 1</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Line 1" class="form-control" name="address1" value="{{ $lead->address1 }}">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Address 2</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Line 2" class="form-control" name="address2" value="{{ $lead->address2 }}">
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">City</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="City" class="form-control input-inline input-medium" name="city" value="{{ $lead->city }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">State</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="State" class="form-control input-inline input-medium" name="state" value="{{ $lead->state }}">
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
                      <input type="text" placeholder="Zipcode" class="form-control input-inline input-medium" name="zip_code" value="{{ $lead->zip_code }}">
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Country</label>
                    <div class="col-md-6">
                      <input type="text" placeholder="Country" class="form-control input-inline input-medium" name="country" value="{{ $lead->country }}">
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
                      {{ $lead->created_at }}
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label class="col-md-6 control-label">Last updated</label>
                    <div class="col-md-6">
                      {{ $lead->updated_at }}
                      <span class="help-inline"> Inline help. </span>
                    </div>
                  </div>
                </div>
              </div>
              
              
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <input type="hidden" name="id" value="{{ $lead->id }}">
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

