@extends('layouts.app')

@section('pageHeading')
  Admin Dashboard
@endsection

@section('content')

  <div class="row">
    <div class="col-md-12 ">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
        <div class="portlet-title">
          <h1>Coupons</h1>
          <a href="{{ route('coupon-add') }}" class="btn btn-default">ADD</a>
        </div>
        <div class="portlet-body">
          <div class="table-scrollable">
            <table class="table table-striped table-hover">
              <thead>
              <tr>
                <th> Coupon </th>
                <th> Affiliate %</th>
                <th> Buyer %</th>
                <th> Shipping</th>
                <th> Packages</th>
                <th> Status </th>
                <th> User </th>
                
                <th> Action </th>
              </tr>
              </thead>
              <tbody>
              @foreach($coupons as $row)
              <tr>
                <td> {{ $row->coupon }} </td>
                <td> {{ $row->affiliate_discount }} </td>
                <td> {{ $row->buyer_discount }} </td>
                <td> {{ $row->shipping }} </td>
                <td> {{ $row->package1 == 1 ? 'Package1' : '' }} {{ $row->package2 == 1 ? 'Package2' : '' }} {{ $row->package3 == 1 ? 'Package3' : '' }}</td>
                <td> {{ $row->active == 1 ? 'Active' : 'Inactive' }}</td>
                <td> {{ $row->user->name or '' }} </td>
                
                
                <td>
                  
                  <a href="{{ route('coupon-edit', $row->id) }}">Edit</a> <a href="{{ route('coupon-delete', $row->id) }}">Delete</a>
                </td>
              </tr>
              @endforeach
              {{ $coupons->links() }}
              {{--<tr>--}}
                {{--<td> 2 </td>--}}
                {{--<td> Jacob </td>--}}
                {{--<td> Nilson </td>--}}
                {{--<td> jac123 </td>--}}
                {{--<td>--}}
                  {{--<span class="label label-sm label-info"> Pending </span>--}}
                {{--</td>--}}
              {{--</tr>--}}
              {{--<tr>--}}
                {{--<td> 3 </td>--}}
                {{--<td> Larry </td>--}}
                {{--<td> Cooper </td>--}}
                {{--<td> lar </td>--}}
                {{--<td>--}}
                  {{--<span class="label label-sm label-warning"> Suspended </span>--}}
                {{--</td>--}}
              {{--</tr>--}}
              {{--<tr>--}}
                {{--<td> 4 </td>--}}
                {{--<td> Sandy </td>--}}
                {{--<td> Lim </td>--}}
                {{--<td> sanlim </td>--}}
                {{--<td>--}}
                  {{--<span class="label label-sm label-danger"> Blocked </span>--}}
                {{--</td>--}}
              {{--</tr>--}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

