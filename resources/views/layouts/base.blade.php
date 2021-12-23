<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Kum Jude Tem">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="">
  <title>Pacho Design</title>

  {{-- vendor --}}
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/chartist.min.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
  @livewireStyles
</head>

<body>
  <!-- Preloader - style you can find in spinners.css -->
  {{-- <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div> --}}
  <!-- Main wrapper - style you can find in pages.scss -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">

          <!-- Logo -->
          <a class="navbar-brand" href="">
            <!-- Logo icon -->
            <b class="logo-icon">
              <img src="" alt="pacho design" class="dark-logo" />
            </b>
          </a>

          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
        </div>
        <!-- End Logo -->

        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

    {{-- app name --}}
          <ul class="navbar-nav float-left mr-auto">
            <h3 class="text-white text-uppercase">Pacho Design</h3>
          </ul>

          <!-- authentication - Right side -->
          <ul class="navbar-nav float-right">
            <li class="nav-item dropdown">
              @guest
                @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </nav>
    </header>

    <!-- End Topbar header -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <!-- User Profile-->
            <li>
              <!-- User Profile-->
              @auth
                <div class="user-profile d-flex no-block dropdown m-t-20">
                  <div class="user-pic"><img src="{{ asset('assets/img/download.jfif') }}"
                      alt="{{ Auth::user()->name }}" class="rounded-circle" width="40" /></div>
                  <div class="user-content hide-menu m-l-10">
                    <a href="" class="" id="Userdd" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <h5 class="m-b-0 user-name font-medium">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i>
                      </h5>
                      <span class="op-5 user-email">{{ Auth::user()->email }}</span>
                    </a>
                  @endauth
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                    <a class="dropdown-item" href=""><i class="ti-user m-r-5 m-l-5"></i> My
                      Profile</a>
                    <a class="dropdown-item" href=""><i class="ti-wallet m-r-5 m-l-5"></i> My
                      Balance</a>
                    <a class="dropdown-item" href=""><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=""><i class="ti-settings m-r-5 m-l-5"></i> Account
                      Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=""><i class="fa fa-power-off m-r-5 m-l-5"></i>
                      Logout</a>
                  </div>
                </div>
              </div>
              <!-- End User Profile-->
            </li>
            <li class="p-15 m-t-10">
              <a href="{{ route('order.add') }}"
                class="btn btn-block create-btn text-white no-block d-flex align-items-center">
                <i class="ti-plus"></i> <span class="hide-menu m-l-5">Create New Order</span> </a>
            </li>
            <!-- User Profile-->
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/"
                aria-expanded="false"><i class="ti-dashboard mdi-view-dashboard"></i><span
                  class="hide-menu">Dashboard</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('orders') }}"
                aria-expanded="false"><i class="ti-shopping-cart-full"></i><span class="hide-menu">Orders</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('categories') }}"
                aria-expanded="false">
                <i class="ti-server"></i><span class="hide-menu">Categories</span>
              </a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href=""
                aria-expanded="false"><i class="ti-control-pause"></i><span class="hide-menu">Pending
                  Orders</span></a>
            </li>
            {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="starter-kit.html" aria-expanded="false"><i class="mdi mdi-file"></i><span
                  class="hide-menu">Blank</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="error-404.html" aria-expanded="false"><i class="mdi mdi-alert-outline"></i><span
                  class="hide-menu">404</span></a>
            </li>
            <li class="text-center p-40 upgrade-btn">
              <a href="" class="btn btn-block btn-danger text-white" target="_blank">Pending Tasks</a>
            </li> --}}
          </ul>

        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- Page wrapper  -->

    {{ $slot }}

    <footer class="footer text-center">
      <div class="row">
        <div class="col-md-6 ml-5">&copy; Pacho Design - All Rights Reserved</div>
        <div class="col-md-4">Developed by
          <a href="https://softechdev.netlify.app">Kum Jude Tem</a>.
        </div>
      </div>
    </footer>
  </div>


  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{ asset('assets/js/waves.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>

  <!--This page JavaScript -->
  <!--chartis chart-->
  <script src="{{ asset('assets/js/chartist.min.js') }}"></script>
  <script src="{{ asset('assets/js/chartist-plugin-tooltip.min.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard1.js') }}"></script>
  <script src="{{ asset('assets/js/jQuery.print.js') }}"></script>

  <script src="{{ asset('js/app.js') }}" defer></script>

  <!--Custom JavaScript -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  @livewireScripts
</body>

</html>
