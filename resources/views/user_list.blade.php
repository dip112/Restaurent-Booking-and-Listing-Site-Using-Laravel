@extends('admin_layout')
@section('content')
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
        @if(Session::get('user')['is_admin']==1)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->user_id}}</th>
                    <td>{{$user->user_fname}} {{$user->user_lname}}</td>
                    <td>{{$user->user_mail}}</td>
                    <td>{{$user->user_type}}</td>
                    <td>
                        <a href="edit_user/{{$user->user_id}}"><i class="bi bi-pencil-square" style="color:#45cabf; margin-right:5px;"></i></a>
                        <a href="delete_user/{{$user->user_id}}"><i class="bi bi-trash" style="color:red;"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div><h4 style="color:red;">You Can't Access It!</h4></div>
        @endif
    </div>
    <br>
</div>
@stop