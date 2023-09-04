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

<body class="sb-nav-fixed">
    <!-- header -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #f1f1f1;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin_index.php" style="color: #45cabf;"><b>Restro App</b></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="margin-left: auto; margin-right: 0;">

            <li class="nav-item dropdown">
                <a class="nav-link " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="text-muted text-center" style="color:black;">Hi, {{Session::get('user')['user_fname']}} </span><i class="bi-person-circle h4" style="color:#45cabf"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> -->
                    <li><a class="dropdown-item" href="/logout">Logout <i class="bi bi-power"></i></a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-auto sticky-top" style="background-color: #f1f1f1;">
                <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top" style="background-color: #f1f1f1;">
                    <!-- <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        <i class="bi-bootstrap fs-1"></i>
                    </a> -->
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="bi-house fs-1 fa-2x" style="color:#45cabf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/add" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                                <i class="bi bi-file-earmark-plus fs-1 fa-2x" style="color:#45cabf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/booked_users" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="bi-table fs-1 fa-2x" style="color:#45cabf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/res_list" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                                <i class="bi bi-card-list fs-1 fa-2x" style="color:#45cabf"></i>
                            </a>
                        </li>
                        <li>
                            @if(Session::get('user')['is_admin']==0)
                            <a href="javascript:void(0)" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers" hidden>
                                <i class="bi-people fs-1 fa-2x" style="color:#45cabf"></i>
                            </a>
                            <br>
                            <br>
                            @else
                            <a href="user_list" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="bi-people fs-1 fa-2x" style="color:#45cabf"></i>
                            </a>
                            @endif
                        </li>
                        <li class="text-muted" style="margin-top:90px;">
                            <p style="margin-bottom:2px"></p>
                            <p></p>
                        </li>
                    </ul>
                    <!-- <div class="dropdown">
                        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-person-circle h2" style="color:#45cabf"></i>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                        </ul>
                    </div> -->
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-sm p-3 min-vh-100">
                <!-- content -->
                @yield('content')
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="py-4 mt-auto" style="background-color:#f1f1f1;">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted" style="margin-left:60px;">Copyright &copy; <a href="/" style="text-decoration: none; color:#6C757D" target="_blank">Restro 2023</a></div>
                <div>
                    <a href="#" style="text-decoration: none;">Privacy Policy</a>
                    &middot;
                    <a href="#" style="text-decoration: none;">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>

</html>