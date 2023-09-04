@extends("admin_layout")
@section("content")
<div class="container col-13" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Booked Users</h4>
        <hr>
    </div>
    <br>
    @if(Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        <strong>{{Session::get('status')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Childs</th>
                    <th scope="col">Adults</th>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::get('user')['is_admin']==0)
                @foreach($booking as $item)
                <tr>
                    <th scope="row">{{$item->booking_id}}</th>
                    <td>
                        @foreach($customers as $customer)
                            @if($item->booking_user_id==$customer->user_id)
                                {{$customer->user_fname}}
                                {{$customer->user_lname}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($res as $r)
                            @if($item->booking_res_id==$r->res_id)
                                {{$r->res_name}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>{{$item->booking_phone}}</td>
                    <td>{{$item->booking_childs}}</td>
                    <td>{{$item->booking_adults}}</td>
                    <td>{{$item->booking_date}}</td>
                    <td>{{$item->booking_type}}</td>
                    <td>
                        <a href="delete_booking/{{$item->booking_id}}"><i class="bi bi-trash" style="color:red;"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                @foreach($booked as $item)
                <tr>
                    <th scope="row">{{$item->booking_id}}</th>
                    <td>
                        @foreach($customers as $customer)
                            @if($item->booking_user_id==$customer->user_id)
                                {{$customer->user_fname}}
                                {{$customer->user_lname}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($res as $r)
                            @if($item->booking_res_id==$r->res_id)
                                {{$r->res_name}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>{{$item->booking_phone}}</td>
                    <td>{{$item->booking_childs}}</td>
                    <td>{{$item->booking_adults}}</td>
                    <td>{{$item->booking_date}}</td>
                    <td>{{$item->booking_type}}</td>
                    <td>
                        <a href=""><i class="bi bi-pencil-square" style="color:#45cabf; margin-right:5px;"></i></a>
                        <a href="delete_booking/{{$item->booking_id}}"><i class="bi bi-trash" style="color:red;"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <br>
</div>
@stop