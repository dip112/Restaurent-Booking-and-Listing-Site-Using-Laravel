@extends('layout')
@section('contents')
@if(Session::get('user'))
<div class="container col-5" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Book Restaurant</h4>
        <hr>
    </div>
    <br>
    <div class="container">
        <script>
            function getValidation() {
                let x = document.getElementById('booking_child').value;
                let y = document.getElementById('booking_adult').value;
                let z = document.getElementById('booking_date').value;
                const date = new Date();
                let day = date.getDate();
                let month = date.getMonth() + 1;
                let year = date.getFullYear();
                if (month < 10) month = "0" + month;
                if (day < 10) day = "0" + day;
                let currentDate = `${year}-${month}-${day}`;

                if (x < 0 || y < 0) {
                    document.getElementById('msg').innerHTML = "Value must be greater than 0";
                    return false;
                } 
                else if (z < currentDate) {
                    document.getElementById('msg').innerHTML = "Past date can't be valid!";
                    return false;
                }
                return true;
            }
        </script>
        @if(Session::get('status'))
        <div class="alert alert-danger text-center" role="alert">
            {{Session::get('status')}}
        </div>
        @endif
        <form action="/book" method="post">
            @csrf
            <input type="hidden" name="booking_res_id" class="form-control" value="{{$data->res_id}}">
            <input type="hidden" name="booking_res_owner_id" class="form-control" value="{{$data->res_user_id}}">

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="booking_name" class="form-control" value="{{Session::get('user')['user_fname']}} {{Session::get('user')['user_lname']}}" disabled>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="booking_phone" class="form-control" placeholder="Enter Phone Number" maxlength="10" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Childrens</label>
                        <input type="number" name="booking_child" id="booking_child" class="form-control" placeholder="Enter No of Childrens" required>
                    </div>
                    <div class="col">
                        <label>Adults</label>
                        <input type="number" name="booking_adult" id="booking_adult" class="form-control" placeholder="Enter No of Adults" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Date</label>
                        <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Booking Type</label>
                        <select class="form-control" name="booking_type" required>
                            <option value="">Select an option</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>
                </div>
                <div class="mt-2">
                    <p id="msg" style="color:red;"></p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#45cabf;border-color:#45cabf; margin-right:200px;" onclick="return getValidation()">Book</button>
        </form>
    </div>
    <br>
</div>
@else
<script>
    window.location = "/login";
</script>
@endif
@stop