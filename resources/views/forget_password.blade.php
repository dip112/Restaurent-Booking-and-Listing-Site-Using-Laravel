@extends('layout')
@section('contents')
<div class="container col-5" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Forget Password</h4>
        <hr>
    </div>
    <br>
    <div class="container">
        @if(Session::get('status'))
        <div class="alert alert-danger text-center" role="alert">
            {{Session::get('status')}}
        </div>
        @endif
        <script>
            function passwordValidate(){
                var newPass = document.getElementById('new_pass').value;
                var conPass = document.getElementById('con_pass').value;
                if(newPass!=conPass){
                    document.getElementById('msg').innerHTML = "Password missmatched!";
                    return false;
                }
                return true;
            }
        </script>
        <form action="/update_password" method="post">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="user_mail" class="form-control" id="user_mail" placeholder="Enter Email" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_pass" class="form-control" id="new_pass" placeholder="Enter New Password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="con_pass" class="form-control" id="con_pass" placeholder="Enter Confirm Password" required>
            </div>
            <div><p id="msg" style="color:red;"></p></div>
            <button type="submit" class="btn btn-primary" style="background-color:#45cabf;border-color:#45cabf; margin-right:183px;" onclick="return passwordValidate()">Update</button>
        </form>
    </div>
    <br>
</div>
@stop