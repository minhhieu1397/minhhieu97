<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Timesheet</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navigation -->
    <div class="container-fluid navbar navbar-expand-lg navbar-dark static-top bg-dark">
        @include('partial/timesheet_nav')
    </div>
    
<!-- Page Content -->	
  	<div class="container-fluid">
  		<div class="content">
            @yield('content')
        </div>
  	</div>
    <!-- Footer -->
    <footer class="page-footer font-small bg-dark blue">
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
    <!-- Footer -->
</body>
</html>