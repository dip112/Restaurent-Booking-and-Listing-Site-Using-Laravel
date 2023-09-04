@extends('layout')
@section('contents')

<div class="container" style="background-color:#f1f1f1; margin-top:155px; margin-bottom:155px;">
    @if(Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        <strong>{{Session::get('status')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(!empty($booking))
    <div class="mt-5 mb-5">
        <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-sm">
            <!-- Basic Plan -->
            <div class="row align-items-center">
                <div class="col-12 col-md-4 mb-2">
                    <img src="{{url('/images/rest.jpeg')}}" alt="" style="width:150px; height:100px;">
                </div>
                <div class="col-12 col-md-4">
                    <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing text-muted">
                        {{$res->res_name}}
                    </h4>
                    <div class="text-secondary-d1 text-120">
                        <span class="ml-n15 align-text-bottom"><strong>Date:</strong> <mark>{{$booking->booking_date}}</mark></span>
                    </div>
                    <div class="text-secondary-d1 text-120">
                        <span class="ml-n15 align-text-bottom"><strong>Type:</strong> <mark>{{$booking->booking_type}}</mark></span>
                    </div>
                </div>

                <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0" style="margin:auto;">
                    <li>
                        <i class="fa fa-check text-110 mr-2 mt-1" style="color: rgb(0, 128, 55);"></i>
                        <span class="text-110">
                            <strong style="color:green;">Phone:</strong> {{$booking->booking_phone}}
                        </span>
                    </li>

                    <li class="mt-25">
                        <i class="fa fa-check text-110 mr-2 mt-1" style="color: rgb(0, 128, 55);"></i>
                        <span class="text-110">
                            <strong style="color:green;">Childs:</strong> {{$booking->booking_childs}}
                        </span>
                    </li>

                    <li class="mt-25">
                        <i class="fa fa-check text-110 mr-2 mt-1" style="color: rgb(0, 128, 55);"></i>
                        <span class="text-110">
                            <strong style="color:green;">Adults:</strong> {{$booking->booking_adults}}
                        </span>
                    </li>
                </ul>

                <div class="col-12 col-md-4 text-center">
                    <a href="delete/{{$booking->booking_id}}" class="f-n-hover btn btn-danger btn-raised px-4 py-25 text-600" style="width: 140px;">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div>
        <br>
        <br>
        <h3 class="text-center">No booking records found!</h3>
        <br>
        <br>
    </div>
    @endif
</div>
@stop