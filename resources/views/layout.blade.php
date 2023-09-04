<!DOCTYPE html>
<html>

    <head>
        <title>Restro App</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #f1f1f1;">
                <a class="navbar-brand ml-3" href="/">
                    <h4 style="color:#45cabf;">Restro</h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto mr-3">
                        <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="/lists">Restaurants</a>
                        <!-- <a class="nav-item nav-link active" href="/add">Add</a> -->
                        @if(Session::get('user'))
                        <!-- <a>Hi, {{Session::get('user')}} <i class="bi bi-user"></i></a> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">Hi, {{Session::get('user')['user_fname']}} <i class="bi bi-person"></i></a>
                            <div class="dropdown-menu col-5" style="margin-left:-10px;">
                                <a class="dropdown-item" href="/booking_list">Booking List</a>
                                <!-- <a class="dropdown-item" href="#">Change Password</a> -->
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                        @else
                        <a class="nav-item nav-link active" href="/login">Login/Signup</a>
                        @endif
                    </div>
                </div>
            </nav>
        </header>
        <div style=" margin-bottom:20px">
            @yield('contents')
        </div>
        <footer class="text-center text-white" style="background-color: #f1f1f1;">
            <!-- Grid container -->
            <div class="container pt-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.facebook.com/profile.php?id=100023484850605" role="button" data-mdb-ripple-color="dark" target="_blank"><i class="fa fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://twitter.com/d_i_p_r_o_y" role="button" data-mdb-ripple-color="dark" target="_blank"><i class="fa fa-twitter"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/dipuu_vai/" role="button" data-mdb-ripple-color="dark" target="_blank"><i class="fa fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.linkedin.com/in/dipankar-roy-b8b28820a/" role="button" data-mdb-ripple-color="dark" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://github.com/dip112" role="button" data-mdb-ripple-color="dark" target="_blank"><i class="fa fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center text-dark p-3" style="background-color: #e0e0e0;">
                © 2023 Copyright:
                <a class="text-dark" href="/">Restro</a>
            </div>
            <!-- Copyright -->
        </footer>
    </body>
</html>