@extends('layout')
@section('contents')
<div class="container col-5" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Login</h4>
        <hr>
    </div>
    <br>
    <div class="container">
        @if(Session::get('status'))
        <div class="alert alert-danger text-center" role="alert">
            {{Session::get('status')}}
        </div>
        @endif
        @if(Session::get('Status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
            <strong>{{Session::get('Status')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="login" method="post">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="user_mail" class="form-control" id="user_mail" placeholder="Enter Email" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="user_pass" class="form-control" id="user_pass" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#45cabf;border-color:#45cabf; margin-right:183px;">Login</button>
            <span style="text-align: right;">Don't have account?<a href="/register" style="color:#45cabf;"> Register here</a></span>
        </form>
        <div class="text-" style="text-align: right;"><span>Forget password? <a href="forget_password" style="color:#45cabf;">Click here</a></span></div>
    </div>
    <br>
</div>
@stop