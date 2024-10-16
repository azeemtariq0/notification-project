<!-- HEADER -->
<header id="header" style="position: fixed;width: 100%;">

    <!-- Mobile Button -->
    <button id="mobileMenuBtn"></button>

    <!-- Logo -->
    <span class="logo pull-left">
        <a href="{{ url('/') }}">
            <!-- <img src="{{ asset('assets/images/logo_light.png') }}" alt="admin panel" height="30" /> -->
        </a>
    </span>
    <form method="get" action="page-search.html" class="search pull-left hidden-xs">
        <span >
        <h3> &nbsp&nbsp Pharmacy Management Systemt @ <strong class="text-danger">2024-2025</strong></h3>
    </span>
    </form>

    <nav>

        <!-- OPTIONS LIST -->
        <ul class="nav pull-right">

            <!-- USER OPTIONS -->
            <li class="dropdown pull-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img class="user-avatar" alt="" src="{{ asset('assets/images/noavatar.jpg') }}" height="34" /> 
                    <span class="user-name">
                        <span class="hidden-xs">
                            {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                </a>
                <ul class="dropdown-menu hold-on-click">
                    <li><!-- my calendar -->
                        <a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
                    </li>
                    <li><!-- my inbox -->
                        <a href="#"><i class="fa fa-envelope"></i> Inbox
                            <span class="pull-right label label-default">0</span>
                        </a>
                    </li>
                    <li><!-- settings -->
                        <a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
                    </li>

                    <li class="divider"></li>

                    <li><!-- lockscreen -->
                        <a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
                    </li>
                    <li><!-- logout -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>{{ __('Logout') }}</a>
                    </li>
                </ul>
            </li>
            <!-- /USER OPTIONS -->

        </ul>
        <!-- /OPTIONS LIST -->

    </nav>

</header>
<!-- /HEADER -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>