@extends('layout')
@section('contents')
<div class="container col-5" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Register</h4>
        <hr>
    </div>
    <br>
    <div class="container">
        <script>
            function getValidation()
            {
                var pass = document.getElementById('user_pass').value;
                var con_pass = document.getElementById('user_con_pass').value;
                if(pass!=con_pass){
                    document.getElementById('msg').innerHTML = "Password mismatch!";
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
        <form action="register" method="post">
            @csrf
            <!-- <div class="form-group">
                <label>Name</label>
                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Enter Name" required>
            </div> -->
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>First Name</label>
                        <input type="text" name="user_fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="col">
                        <label>Last Name</label>
                        <input type="text" name="user_lname" class="form-control" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="user_mail" class="form-control" id="user_mail" placeholder="Enter Email" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label>User Type</label>
                <select class="form-control" name="user_type" id="" required>
                    <option value="">Select an option</option>
                    <option value="Customer">Customer</option>
                    <option value="Owner">Owner</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Password</label>
                        <input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col">
                        <label>Confirm Password</label>
                        <input type="password" name="user_con_pass" id="user_con_pass" class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div>
                    <p id="msg" style="color:red;"></p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#45cabf;border-color:#45cabf; margin-right:200px;" onclick="return getValidation()">Register</button>
            <span style="text-align: right;">Have an account?<a href="/login" style="color:#45cabf;"> Login here</a></span>
        </form>
    </div>
    <br>
</div>
@stop