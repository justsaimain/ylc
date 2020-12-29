<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-chart-pie menu-icon"></i> <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./index.html">Home 1</a></li>
                    <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                </ul>
            </li>
            <li class="nav-label">Course Management</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-bookmark menu-icon"></i> <span class="nav-text">Category</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.view_category') }}">View</a></li>
                    <li><a href="{{ route('dashboard.create_category') }}">Create New</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-file-alt menu-icon"></i> <span class="nav-text">Course</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.view_course') }}">View</a></li>
                    <li><a href="{{ route('dashboard.create_course') }}">Create New</a></li>
                </ul>
            </li>
            <li class="nav-label">Students</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-users menu-icon"></i> <span class="nav-text">Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.view_student') }}">View</a></li>
                </ul>
            </li>
            <li class="nav-label">Teachers</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-graduate menu-icon"></i> <span class="nav-text">Teacher Accounts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.view_teacher') }}">View</a></li>
                    <li><a href="{{ route('dashboard.create_teacher') }}">Create New</a></li>
                </ul>
            </li>
            <li class="nav-label">Admins</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-cog menu-icon"></i> <span class="nav-text">Admin Accounts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard.view_admin') }}">View</a></li>
                    <li><a href="{{ route('dashboard.create_admin') }}">Create New</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
