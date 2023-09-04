@extends('admin_layout')
@section('content')
<div class="container col-6" style="margin-top:50px; margin-bottom:50px; border:solid 4px #f1f1f1;">
    <br>
    <div>
        <h4 class="text-center">Add Restaurant</h4>
        <hr>
    </div>
    <br>
    <div class="container">
        <form action="add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Restaurant Name</label>
                <input type="text" name="res_name" class="form-control" id="res_name" placeholder="Enter Name" required>
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label>Restaurant Address</label>
                <input type="text" name="res_address" class="form-control" id="res_address" placeholder="Enter Address" required>
            </div>
            <div class="form-group">
                <label>Restaurant Description</label>
                <textarea type="text" name="res_description" class="form-control" id="res_description" placeholder="Enter Description (100 characters)" maxlength="100" required></textarea>
            </div>
            <div class="form-group">
                <label>Restaurant Price</label>
                <input type="number" name="res_price" class="form-control" id="res_price" placeholder="Enter Price" required>
            </div>
            <div class="form-group">
                <label>Restaurant Banner</label>
                <input type="file" name="res_banner" class="form-control-file" id="res_banner" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#45cabf;border-color:#45cabf;">Submit</button>
        </form>
    </div>
    <br>
</div>
@stop