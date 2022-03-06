<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> {{config('app.name')}} </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/dataTables.bootstrap4.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/dataTables.responsive.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/select2.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/select2-bootstrap4.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/laravel-admin/css/jquery-ui.css') }}"/>
        @stack('styles')
        @if(View::exists('laravel-admin-custom-views.styles'))
            @include('laravel-admin-custom-views.styles')
        @endif
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="header-block header-block-search">
                        @if(View::exists('laravel-admin-custom-views.global_search'))
                            @include('laravel-admin-custom-views.global_search')
                        @else
                            <form role="search">
                                <div class="input-container">
                                    <i class="fa fa-search"></i>
                                    <input type="search" placeholder="Search">
                                    <div class="underline"></div>
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="header-block header-block-buttons">

                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            @if(View::exists('laravel-admin-custom-views.notifications'))
                                @include('laravel-admin-custom-views.notifications')
                            @else
                            <li class="notifications new">
                                <a href="" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <sup>
                                        <span class="counter">8</span>
                                    </sup>
                                </a>
                                <div class="dropdown-menu notifications-dropdown-menu">
                                    <ul class="notifications-container">
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url({{asset('vendor/laravel-admin/images/person.jpg')}})"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">Zack Alien</span> pushed new commit: <span class="accent">Fix page load performance issue</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url({{asset('vendor/laravel-admin/images/person.jpg')}})"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">Amaya Hatsumi</span> started new task: <span class="accent">Dashboard UI design.</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url({{asset('vendor/laravel-admin/images/person.jpg')}})"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">Andy Nouman</span> deployed new version of <span class="accent">NodeJS REST Api V3</span>
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer>
                                        <ul>
                                            <li>
                                                <a href=""> View All </a>
                                            </li>
                                        </ul>
                                    </footer>
                                </div>
                            </li>
                            @endif
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if(View::exists('laravel-admin-custom-views.user_name_image'))
                                        @include('laravel-admin-custom-views.user_name_image')
                                    @else
                                    <div class="img" style="background-image: url('https://www.gravatar.com/avatar/{{ md5(Auth::guard('admin')->user()->email)}}')">
                                    </div>
                                    <span class="name"> {{Auth::guard('admin')->user()->name}} </span>
                                    @endif
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    @if(View::exists('laravel-admin-custom-views.user_menu'))
                                        @include('laravel-admin-custom-views.user_menu')
                                    @else
                                    <a class="dropdown-item" href="{{route('admins.changePassword')}}">
                                        <i class="fa fa-lock icon"></i> Change Password </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
                                        <form id="logout-form" action="/admin/logout" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                {{config('app.name')}}
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                @if(View::exists('laravel-admin-custom-views.menus'))
                                    @include('laravel-admin-custom-views.menus')
                                @endif
                                @can('manage_admins')
                                <li class="{{ (request()->is('admin/permissions*')) || (request()->is('admin/roles*')) || (request()->is('admin/admins*')) ? 'active open' : '' }}" >
                                    <a href="">
                                        <i class="fa fa-users"></i> {{__('laravel-admin::sidebar.admin_management')}} <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li class="{{(request()->is('admin/permissions*')) ? 'active' : '' }}">
                                            <a href="/admin/permissions"> <i class="fa fa-key"> </i> {{ __('Permissions') }} </a>
                                        </li>
                                        <li class="{{(request()->is('admin/roles*')) ? 'active' : '' }}">
                                            <a href="/admin/roles"> <i class="fa fa-briefcase"> </i> {{ __('Roles') }} </a>
                                        </li>
                                        <li class="{{(request()->is('admin/admins*')) ? 'active' : '' }}">
                                            <a href="/admin/admins"> <i class="fa fa-users"> </i> {{ __('Admins') }} </a>
                                        </li>
                                    </ul>
                                </li>
                                @endcan
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-4">
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">fixed</label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">static</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Sidebar:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Header:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Footer:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a href="">
                                    <i class="fa fa-cog"></i> Customize </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page">
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">
                        
                    </div>
                    <div class="footer-block author">
                        <ul>
                            <li>Built with: <a href="https://github.com/laravel/laravel">Laravel</a> | <a href="https://github.com/spatie/laravel-permission">spatie/laravel-permission</a> | <a href="https://github.com/modularcode">ModularCode</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="{{ asset('vendor/laravel-admin/js/vendor.js') }}"></script>
        <script src="{{ asset('vendor/laravel-admin/js/admin.js') }}"></script>
        <script src="{{ asset('vendor/laravel-admin/js/datatables.min.js') }}"></script>
        <script src="{{ asset('vendor/laravel-admin/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendor/laravel-admin/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('vendor/laravel-admin/js/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/laravel-admin/js/jquery-ui.js') }}"></script>
        <script>
            function searchable_select(selector){
                $(selector).select2({
                    theme: 'bootstrap4',
                    width: 'style',
                    placeholder: $(this).attr('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                });
            }
            $(function() {
                $( ".jQueryUiDatepicker" ).datepicker({ 
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'dd-mm-yy',
                    yearRange: '1900:2100'
                });
            });
        </script>
        @if(View::exists('laravel-admin-custom-views.javascripts'))
            @include('laravel-admin-custom-views.javascripts')
        @endif
        @yield('javascript')
    </body>
</html>
