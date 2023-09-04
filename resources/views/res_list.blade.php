@extends("admin_layout")
@section("content")
<div class="container col-13" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Restaurant List</h4>
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
                    <th scope="col">Restaurant Name</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::get('user')['is_admin']==0)
                @foreach($res as $item)
                <tr>
                    <th scope="row">{{$item->res_id}}</th>
                    <td>{{$item->res_name}}</td>
                    <td>{{Session::get('user')['user_fname']}} {{Session::get('user')['user_lname']}}</td>
                    <td>{{$item->res_address}}</td>
                    <td>{{$item->res_description}}</td>
                    <td>{{$item->res_price}}</td>
                    <td><img src="{{asset('/storage/'.$item->res_image)}}" alt="" style="width:85px; height:75px"></td>
                    <td>
                        <a href="edit_res/{{$item->res_id}}"><i class="bi bi-pencil-square" style="color:#45cabf"></i></a>
                        <a href="delete_res/{{$item->res_id}}"><i class="bi bi-trash" style="color:red;"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                @foreach($res as $item)
                <tr>
                    <th scope="row">{{$item->res_id}}</th>
                    <td>{{$item->res_name}}</td>
                    <td>
                        @foreach($users as $user)
                            @if($item->res_user_id==$user->user_id)
                                {{$user->user_fname}}
                                {{$user->user_lname}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>{{$item->res_address}}</td>
                    <td>{{$item->res_description}}</td>
                    <td>{{$item->res_price}}</td>
                    <td><img src="{{asset('/storage/'.$item->res_image)}}" alt="" style="width:85px; height:75px"></td>
                    <td>
                        <a href="edit_res/{{$item->res_id}}"><i class="bi bi-pencil-square" style="color:#45cabf; margin-right:5px;"></i></a>
                        <a href="delete_res/{{$item->res_id}}"><i class="bi bi-trash" style="color:red;"></i></a>
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