@extends('admin_layout')
@section('content')
<div class="container col-5" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Update Restaurant</h4>
        <hr>
    </div>
    <br>
    <div class="container">
        <form action="/update_res" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$res->res_id}}" name="res_id">
            <div class="form-group">
                <label>Restaurant Name</label>
                <input type="text" name="res_name" value="{{$res->res_name}}" class="form-control" id="res_name" placeholder="Enter Restaurent Name"  required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label>Restaurant Address</label>
                <input type="text" name="res_address" value="{{$res->res_address}}" class="form-control" id="res_address" placeholder="Enter Address" required>
            </div>
            <div class="form-group">
                <label>Restaurant Description</label>
                <textarea type="text" name="res_description" class="form-control" id="res_description" placeholder="Enter Description (100 characters)" maxlength="100" required>{{$res->res_description}}</textarea>
            </div>
            <div class="form-group">
                <label>Restaurant Price</label>
                <input type="number" name="res_price" value="{{$res->res_price}}" class="form-control" id="res_price" placeholder="Enter Price" required>
            </div>
            <div class="form-group">
                <label>Restaurant Banner</label>
                <div style="margin-bottom: 4px;"><img src="{{asset('/storage/'.$res->res_image)}}" alt="" style="width:98px; height:75px"></div>
                <input type="file" name="res_banner" class="form-control-file" id="res_banner">
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#45cabf;border-color:#45cabf;">Update</button>
        </form>
    </div>
    <br>
</div>
@stop