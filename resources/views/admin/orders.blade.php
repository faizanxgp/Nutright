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
                    <h1>Orders</h1>
                </div>
                <div class="portlet-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{ route('orders-search') }}">

                                <input type="text" name="name" placeholder="Name"/>

                                <input type="text" name="phone" placeholder="Phone"/>
                                <input type="text" name="email" placeholder="Email"/>
                                <input type="text" name="package" placeholder="Package"/>
                                <input type="submit" name="submit" value="Filter"/>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>


                </div>

                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th> Affiliate</th>
                                <th> Name</th>
                                <th> Phone</th>
                                <th> Email</th>
                                <th> Country</th>
                                <th> Package</th>
                                <th> Amount</th>
                                <th> Coupon</th>
                                <th> Status</th>
                                <th> Created</th>
                                <th> Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $row)
                                <tr>
                                    <td> {{ $row->affiliate }} </td>
                                    <td> {{ $row->first_name }} {{ $row->last_name }} </td>
                                    <td> {{ $row->phone }} </td>
                                    <td> {{ $row->email }} </td>
                                    <td> {{ $row->city }} {{ $row->state }} {{ $row->country }}</td>
                                    <td> {{ $row->package }} </td>
                                    <td> {{ $row->order_amount }} </td>
                                    <td> {{ $row->coupon }} </td>
                                    <td>
                                        <span class="label label-sm label-success">{{ $orderStatus[$row->status] or 'NA' }}</span>
                                    </td>
                                    <td> {{ $row->created_at }} </td>
                                    <td>

                                        <a href="{{ route('order-edit', $row->id) }}">Edit</a> <a
                                                href="{{ route('order-delete', $row->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $orders->links() }}
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

