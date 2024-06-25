<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('faq-index') }}">
                <i class="bi bi-question-circle"></i>
                <span>FAQ</span>
            </a>
        </li><!-- End FAq Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('help-index') }}">
                <i class="bi bi-headset"></i>
                <span>Help</span>
            </a>
        </li><!-- End FAq Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('market-index') }}">
                <i class="bi bi-person"></i>
                <span>Marketing Assets</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profile.edit') }}">
                <i class="bi bi-person-circle"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('all-leads') }}">
                <i class="bi bi-arrow-up-right-square-fill"></i>
                <span>All Lead</span>
            </a>
        </li>
        {{-- <!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('bankwise-eligibility') }}">
                <i class="bi bi-play"></i>
                <span>Bankwise Eligibility</span>
                </a>
            </li><!-- End Marketing Assets Page Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('applications') }}">
                    <i class="bi bi-person"></i>
                    <span>Applications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('add-staff') }}">
                    <i class="bi bi-person-add"></i>
                    <span>Add Staff</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('add-staff') }}">
                    <i class="bi bi-person-add"></i>
                    <span>My Team</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('loans') }}">
                    <i class="bi bi-person-add"></i>
                    <span>Loans</span>
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('training-video') }}">
                <i class="bi bi-play"></i>
                <span>Training Videos</span>
            </a>
        </li><!-- End Manage Admin Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('all-admins') }}">
                <i class="bi bi-headset"></i>
                <span>Manage Admin</span>
            </a>
        </li><!-- End Manage Admin Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('all-role') }}">
                <i class="bi bi-headset"></i>
                <span>Manage Roles</span>
            </a>
        </li><!-- End Manage Admin Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('managers.index') }}">
                <i class="bi bi-headset"></i>
                <span>Managers</span>
            </a>
        </li><!-- End Manager Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('branches.index') }}">
                <i class="bi bi-headset"></i>
                <span>Branches</span>
            </a>
        </li><!-- End Manage Admin Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('assign-branch') }}">
                <i class="bi bi-headset"></i>
                <span>Branch Assigned</span>
            </a>
        </li><!-- End Manage Admin Nav --> --}}



        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('faq-index') }}">
                <i class="bi bi-question-circle"></i>
                <span>Bankwise Eligibility</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed {{ request()->routeIs('show-notification') ? 'active' : '' }}"
                href="{{ route('show-notification') }}">
                <i class="bi bi-bell"></i>
                <span>Notification</span>
            </a>
        </li>
        <!-- End Notifications Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('show-category') }}">
                <i class="bi bi-envelope"></i>
                <span>Feedback</span>
            </a>
        </li>
        <!-- End Contact Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('wishlist') }}">
                <i class="bi bi-envelope"></i>
                <span>Wish List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Manage Roles</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('all-role') }}">
                        <i class="bi bi-circle"></i><span>All Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('add-role') }}">
                        <i class="bi bi-circle"></i><span>Add Roles</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Manage Admin</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('manage-admin') }}">
                        <i class="bi bi-circle"></i><span>All Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('add-admin') }}">
                        <i class="bi bi-circle"></i><span>Add Admin</span>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</aside><!-- End Sidebar-->
