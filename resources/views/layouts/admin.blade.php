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
  <header class="st-navbar">
    @include('partial/admin_nav')
  </header>
  <!-- Navigation -->

<!-- Page Content -->	

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar border admin-menu">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
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
            </div>
        </nav>
      @yield('content')
    </div>
</div>

      <footer class="navbar-dark bg-dark admin-footer">
        <div class="container-fluid pading">
          <div class="row text-center">
              <div class="col-md-4">
                      <div class="text-center text-white">
                          Branch 1: 
                      </div>
                      <div class="text-center text-white">
                          Address: Cầu Giấy, Ha Noi
                      </div>
                      <div class="text-center text-white">
                          Phone: 01111111111
                      </div>
                      <div class="text-center text-white">
                          Email: abv@gmail.com
                      </div>
              </div>
              <div class="col-md-4">
                      <div class="text-center text-white">
                          Branch 2: 
                      </div>
                      <div class="text-center text-white">
                          Address: Đống Đa, Ha Noi
                      </div>
                      <div class="text-center text-white">
                          Phone: 012332424242
                      </div>
                      <div class="text-center text-white">
                          Email: minhhieuadasdada@gmail.com
                      </div>
              </div>
              <div class="col-md-4">
                      <div class="text-center text-white">
                          Branch 1: 
                      </div>
                      <div class="text-center text-white">
                          Address: Hà Đông, Ha Noi
                      </div>
                      <div class="text-center text-white">
                          Phone: 1231231231313
                      </div>
                      <div class="text-center text-white">
                          Email: abvdấdadadasd@gmail.com
                      </div>
              </div>
          </div>
        </div>
      </footer>
</body>

</html>