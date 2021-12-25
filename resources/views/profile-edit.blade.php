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
            <span class="caption-subject font-dark sbold uppercase">Profile</span>
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
          <form role="form" class="form-horizontal" method="post" action="{{ route('profile-edit') }}">
            <div class="form-body">
              <div class="form-group">
                <label class="col-md-3 control-label">Name</label>
                <div class="col-md-9">
                  <input type="text" placeholder="name" class="form-control" name="name" value="{{ $member->name }}" >
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
  
              <div class="form-group">
                <label class="col-md-3 control-label">Email</label>
                <div class="col-md-9">
                  <input type="email" placeholder="Email" class="form-control" name="email" value="{{ $member->email }}">
                  <span class="help-inline"> Inline help. </span>
                </div>
              </div>
  
              <div class="form-group">
                <label class="col-md-3 control-label">Password</label>
                <div class="col-md-9">
                  <input type="password" placeholder="" class="form-control" name="password" value="" >
                  <span class="help-block"> A block of help text. </span>
                </div>
              </div>
              
              
              
              
              
              
              
              
              
              
              
              
              <div class="form-actions">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <input type="hidden" name="id" value="{{ $member->id }}">
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

