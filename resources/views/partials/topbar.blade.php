<header class="main-header">
    <nav class="navbar navbar-dark bg-dark navbar-static-top" style="background-color: black; color: white">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ url('/admin/home') }}" class="navbar-brand">KDFootwear</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">

                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/home') }}">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">User management <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                            <li class="dropdown-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="{{ route('auth.change_password') }}">Change password</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                @if (Auth::user()->role_id == 1)

                                    @auth
                                    <a class="dropdown-item" href="{{ url('/admin/home') }}">Dashboard</a>
                                    <a class="dropdown-item" href="{{ url('/welcome') }}">Web Site</a>
                                    @endauth

                                @endif
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <a href="#logout" onclick="$('#logout').submit();">
                                    <span class="title">@lang('quickadmin.qa_logout')</span>
                                </a>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
{{--<header class="main-header">--}}
    {{--<!-- Logo -->--}}
    {{--<a href="{{ url('/admin/home') }}" class="logo"--}}
       {{--style="font-size: 16px;">--}}
        {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
        {{--<span class="logo-mini">--}}
           {{--@lang('quickadmin.quickadmin_title')</span>--}}
        {{--<!-- logo for regular state and mobile devices -->--}}
        {{--<span class="logo-lg">--}}
           {{--@lang('quickadmin.quickadmin_title')</span>--}}
    {{--</a>--}}
    {{--<!-- Header Navbar: style can be found in header.less -->--}}
    {{--<nav class="navbar navbar-static-top">--}}
        {{--<!-- Sidebar toggle button-->--}}
        {{--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
        {{--</a>--}}

        {{----}}

        {{----}}

    {{--</nav>--}}
{{--</header>--}}



