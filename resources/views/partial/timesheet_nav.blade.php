<div class="row">
    <nav class="col-md-10 site-header timesheet-nav menu-timesheet">
        <div class="flex-column flex-md-row justify-content-between timesheet-menu">
            <ul class="nav">
                <li class="dropdown nav-item">
                    <a class="py-2 d-none d-md-inline-block py-2 d-none d-md-inline-block active timesheet-a" href="{{route('timesheets.index')}}">Home</a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle py-2 d-none d-md-inline-block timesheet-a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Timesheets <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('timesheets.create')}}">Create Timesheet</a></li>
                        <li><a href="{{route('timesheet.view')}}">View Timesheet</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class="py-2 d-none d-md-inline-block py-2 d-none d-md-inline-block timesheet-a" href="{{route('users.personal')}}">Personal</a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle py-2 d-none d-md-inline-block timesheet-a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('users.edit.avatar')}}">Update Avatar</a></li>
                            <li><a href="{{route('users.edit')}}">Update Account</a></li>
                            <li><a href="{{route('users.editpassword')}}">Change Password</a></li>
                        </ul>
                </li>
                <li class="dropdown nav-item">
                    <a class="py-2 d-none d-md-inline-block py-2 d-none d-md-inline-block timesheet-a" href="{{route('timesheet.approve')}}">Approve</a>
                </li>
            </ul>
        </div>
    </nav>
    <span class="col-md-1 text-white user-sigout">
        <a class="text-white" href="{{route('logout')}}">Sign out</a>
    </span>
</div>
