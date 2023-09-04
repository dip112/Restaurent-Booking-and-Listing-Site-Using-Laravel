@extends('admin_layout')
@section('content')
<div class="container col-5" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Update User</h4>
        <hr>
    </div>
    <br>
    <div class="container">
        <form action="/update_user" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>First Name</label>
                        <input type="text" name="user_fname" class="form-control" value="{{$user->user_fname}}" placeholder="First Name" required>
                    </div>
                    <div class="col">
                        <label>Last Name</label>
                        <input type="text" name="user_lname" class="form-control" value="{{$user->user_lname}}" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="user_mail" class="form-control" value="{{$user->user_mail}}" placeholder="Enter Email" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label>User Type</label>
                <select class="form-control" name="user_type" required>
                    <option value="">Select an option</option>
                    @if($user->user_type=='Customer')
                    <option value="Customer"selected>Customer</option>
                    <option value="Owner">Owner</option>
                    @else
                    <option value="Customer">Customer</option>
                    <option value="Owner" selected>Owner</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#45cabf;border-color:#45cabf; margin-right:200px;">Update</button>
        </form>
    </div>
    <br>
</div>
@stop