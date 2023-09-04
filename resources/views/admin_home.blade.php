@extends("admin_layout")
@section("content")
@if(Session::get('user')['is_admin']==1)
<div class="card mb-3 col-5" style="margin-left:auto; margin-right:auto; margin-top:90px; background-color:aliceblue;">
  <div class="card-body">
    <h5 class="card-title text-center">Total number of users: {{$users}}</h5>
    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
  </div>
</div>
<div class="card mb-3 col-5" style="margin-left:auto; margin-right:auto; margin-top:90px; background-color:antiquewhite;">
  <div class="card-body">
    <h5 class="card-title text-center">Total number of owners: {{$owners}}</h5>
    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
  </div>
</div>
<div class="card mb-3 col-5" style="margin-left:auto; margin-right:auto; margin-top:90px; background-color:azure;">
  <div class="card-body">
    <h5 class="card-title text-center">Total number of customers: {{$customers}}</h5>
    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
  </div>
</div>
<div class="card mb-3 col-5" style="margin-left:auto; margin-right:auto; margin-top:90px; background-color:beige;">
  <div class="card-body">
    <h5 class="card-title text-center">Total number of bookings: {{$bookings}}</h5>
    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
  </div>
</div>
<div class="card mb-3 col-5" style="margin-left:auto; margin-right:auto; margin-top:90px; background-color:bisque;">
  <div class="card-body">
    <h5 class="card-title text-center">Total number of restaurents: {{$res}}</h5>
    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
  </div>
</div>
@else
<div class="card mb-3 col-5" style="margin-left:auto; margin-right:auto; margin-top:90px; background-color:bisque;">
  <div class="card-body">
    <h5 class="card-title text-center">Total number of restaurents: {{$res}}</h5>
    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
  </div>
</div>
<div class="card mb-3 col-5" style="margin-left:auto; margin-right:auto; margin-top:90px; background-color:aliceblue;">
  <div class="card-body">
    <h5 class="card-title text-center">Total number of bookings: {{$bookings}}</h5>
    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
  </div>
</div>
@endif
@stop