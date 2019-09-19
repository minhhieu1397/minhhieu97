<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid navbar navbar-expand-lg navbar-dark static-top bg-dark">
    @include('partial/admin_nav')
</div>
  <!-- Navigation -->

<!-- Page Content -->	

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-1 sidebar d-none d-md-block bg-light sidebar nav-admin">
            <ul class="nav flex-column admin-menu text-center">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admins.index')}}">
                      <span data-feather="home"></span>
                      Home 
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admins.user.create')}}">Create User</a></li>
                        <li><a href="{{route('admins.users.view')}}">View User</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admins.create')}}">Create Admin</a></li>
                        <li><a href="{{route('admins.view')}}">View Admin</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">System <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admins.hours.edit')}}">Update Hours</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        @yield('content')
    </div>
</div>
</body>

</html>