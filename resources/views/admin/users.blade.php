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
          <h1>Users</h1>
        </div>
        <div class="portlet-body">
          <div class="table-scrollable">
            <table class="table table-striped table-hover">
              <thead>
              <tr>

                <th> Name </th>

                <th> Email </th>
<th>Level</th>
                <th>Created</th>
                <th> Action </th>
              </tr>
              </thead>
              <tbody>
              @foreach($users as $row)
              <tr>
                <td> {{ $row->name }} </td>
                <td> {{ $row->email }} </td>
                <td> {{ $userStatus[$row->access_level] or 'NA' }} </td>
                
                
                <td> {{ $row->created_at }} </td>
                <td>
                  
                  <a href="{{ route('user-edit', $row->id) }}">Edit</a> <a href="{{ route('user-delete', $row->id) }}">Delete</a>
                  @if($user->access_level == 3 and $row->access_level == 1)
                    <a href="{{ route('affiliate-edit', $row->id) }}">Affilate Data</a>
                  @endif
                  
                </td>
              </tr>
              @endforeach
              {{ $users->links() }}
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

