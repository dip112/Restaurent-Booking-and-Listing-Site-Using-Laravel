@extends('layout')
@section('contents')
<div>
    <section id="hero-animated" class="hero-animated d-flex align-items-center" style="background-color:#f0f0f0;">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
            <img src="{{url('/images/home.png')}}" class="img-fluid animated">
            <h2>Welcome to <span style="color:#45cabf;">Restro</span></h2>
            <p>Discover, reserve, and explore a world of flavors with our restaurant listing and booking platform.</p>
            <!-- <div class="d-flex">
                <a href="#about" class="btn btn-primary">Get Started</a>
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div> -->
        </div>
    </section>

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services" style="margin-top: 90px; margin-bottom:70px">
        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-list icon fa-2x"></i></div>
                        <h4 style="margin-top: 10px;"><a href="/lists" class="stretched-link" style="color:#45cabf;">Restaurant Listings</a></h4>
                        <p>Users can be able to search, filter by different attributes, and view details about each restaurant.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-send fa-2x"></i></div>
                        <h4 style="margin-top: 10px;"><a href="" class="stretched-link" style="color:#45cabf;">Restaurant Submission</a></h4>
                        <p>Users can input restaurant details through form.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-check2-circle fa-2x"></i></div>
                        <h4 style="margin-top: 10px;"><a href="" class="stretched-link" style="color:#45cabf;">Reservation System</a></h4>
                        <p>A reservation system that allows users to select a restaurant, date, time, and the number of guests.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-star fa-2x"></i></div>
                        <h4 style="margin-top: 10px;"><a href="" class="stretched-link" style="color:#45cabf;">User Ratings</a></h4>
                        <p>Users can leave reviews and ratings for restaurants.</p>
                    </div>
                </div><!-- End Service Item -->
            </div>
        </div>
    </section><!-- End Featured Services Section -->
</div>
@stop