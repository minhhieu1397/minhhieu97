<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li class="active">
                    <a class="nav-link text-success h5" href="{{route('admins.create')}}">Create</a>
                </li>
                 <li class="nav-item">
                   <a class="nav-link text-success h5" href="{{route('users.view')}}">View User</a>/
                   <a class="nav-link text-success h5" href="">View User</a>
                </li>
               <!-- <li class="nav-item">
                   <a class="nav-link text-success h5" href="{{route('timesheets.index')}}">View Timesheet</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-success h5" href="{{route('hours.edit')}}">Update Hours</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-success h5" href="{{route('admins.index')}}">View User</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-success h5" href="{{route('timesheet.approve')}}">Approve</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-success h5" href="{{route('emails.index')}}">EmailNotification</a>
               </li> -->
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link list_title" href="{{route('logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>