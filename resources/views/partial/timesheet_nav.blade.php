<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-primary h5" href="{{route('timesheets.index')}}">Home</a>
                </li>
                @can ('Admin')
                    <li class="nav-item">
                        <a class="nav-link text-primary h5" href="{{route('users.index')}}">Admin</a>
                    </li>
                @endcan
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link list_title" href="{{route('users.logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>