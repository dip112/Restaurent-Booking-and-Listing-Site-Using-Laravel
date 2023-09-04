@extends('layout')
@section('contents')
<div>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="container" style="margin-bottom: 20px;">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search">
                        <button class="btn btn-primary" type="button" style="background-color:#45cabf; border-color:#45cabf;"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                @if(Session::get('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('status')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @foreach($data as $items)
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{asset('/storage/'.$items['res_image'])}}"></div>
                    <div class="col-md-6 mt-1">
                        <h5>{{$items['res_name']}}</h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>501</span>
                        </div>
                        <div class="mt-1 mb-1 spec-1"><span>{{$items['res_address']}}</span></div>
                        <!-- <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div> -->
                        <p class="text-justify para mb-0 font-weight-light">{{$items['res_description']}}.<br><br></p>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h5 class="mr-1"><del>₹{{$items['res_price']}}</del></h5><span class="strike-text">(Advance)</span>
                        </div>
                        <div class="d-flex flex-column mt-4">   
                            <a class="btn btn-primary" href="/book/{{$items['res_id']}}" style="background-color:#45cabf;border-color:#45cabf; margin-top:43px;">Book Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop