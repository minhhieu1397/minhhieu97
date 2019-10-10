<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>


<body>
    <nav class="container-fluid navbar navbar-dark fixed-top bg-dark flex-md-nowrap hearder-admin">
        <a class="navbar-brand col-sm-3 col-md-2 header-timesheet" href="">Timesheet</a>
        <ul class="navbar-nav px-3 admin-sigout">
            <li class="nav-item text-nowrap">
                <a class="nav-link navbar-right" href="{{route('admins.logout')}}">Sign out</a>
                <img src="{{ auth('admin')->user()->avatar }}" class="img-circle" height="40px" width="40px">
            </li>
        </ul>
    </nav>
    <div class="container-fluid admin-content">
        <div class="row">
            <nav class="col-md-1 d-none d-md-block bg-light sidebar menu-admin">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('admins.index')}}">
                            <span data-feather="home"></span> <i class="glyphicon glyphicon-home"></i>
                                Home 
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> User </a> 
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admins.user.create')}}">Create User</a></li>
                                <li><a href="{{route('admins.users.view')}}">View User</a></li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Admin </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admins.create')}}">Create Admin</a></li>
                                <li><a href="{{route('admins.view')}}">View Admin</a></li>
                            </ul>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-cog"></i> System </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admins.hours.edit')}}">Update Hours</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 col-lg-10 px-4">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Admin</h1>
                    </div>
                </div>
                <div class="row">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>