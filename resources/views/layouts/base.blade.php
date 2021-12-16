<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <title>Pacho Design</title>

  {{-- vendor --}}
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/chartist.min.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
  @livewireStyles
</head>

<body>
  <!-- Preloader - style you can find in spinners.css -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
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
              <!-- Light Logo icon -->
              <img src="" alt="pacho design" class="light-logo" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
              <!-- dark Logo text -->
              <img src="assets/images/logo-text.png" alt="pacho design" class="dark-logo" />
              <!-- Light Logo text -->
              <img src="assets/images/logo-light-text.png" class="light-logo" alt="pacho design" />
            </span>
          </a>

          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
        </div>

        <!-- End Logo -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <ul class="navbar-nav float-left mr-auto">

            <!-- Search -->
            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i
                  class="ti-search"></i></a>
              <form class="app-search position-absolute">
                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i
                    class="ti-close"></i></a>
              </form>
            </li>
          </ul>

          <!-- Right side toggle and nav items -->
          <ul class="navbar-nav float-right">
            <!-- User profile and search -->
            <li class="nav-item dropdown">
              @if (Route::has('login'))
                @auth
                  @if (Auth::user()->role === 'ADM')
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src=""
                        alt="{{ Auth::user()->name }}" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                      <a class="dropdown-item" href=""><i class="ti-user m-r-5 m-l-5"></i> My
                        Orders</a>
                      <a class="dropdown-item" href=""><i class="ti-wallet m-r-5 m-l-5"></i> My
                        Categories
                      </a>
                      <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="ti-email m-r-5 m-l-5"
                            onclick="event.preventDefault(); .closest('form')"></i> Sign
                          Off
                        </a>
                      </form>
                    </div>
                  @else
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="" alt="user"
                        class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                      <a class="dropdown-item" href=""><i class="ti-user m-r-5 m-l-5"></i> My
                        Profile</a>
                      <a class="dropdown-item" href=""><i class="ti-wallet m-r-5 m-l-5"></i> My
                        Balance</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout').submit();">Sign Off </a>
                      <form id="logout" action="{{ route('logout') }}" method="POST">
                        @csrf
                        {{-- {{ @method('POST') }} --}}
                      </form>
                    </div>
                  @endif
                @else
              <li class="menu-item mr-5"><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
              <li class="menu-item mr-3"><a title="Register or Login" href="{{ route('register') }}">Register</a>
              </li>
            @endauth
            @endif
            </li>
            <!-- User profile and search -->
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
              <div class="user-profile d-flex no-block dropdown m-t-20">
                <div class="user-pic"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="users"
                    class="rounded-circle" width="40" /></div>
                <div class="user-content hide-menu m-l-10">
                  <a href="" class="" id="Userdd" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <h5 class="m-b-0 user-name font-medium">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                    </h5>
                    <span class="op-5 user-email">{{ Auth::user()->email }}</span>
                  </a>
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
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="icon-material.html" aria-expanded="false"><i class="mdi mdi-face"></i><span
                  class="hide-menu">Icon</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="starter-kit.html" aria-expanded="false"><i class="mdi mdi-file"></i><span
                  class="hide-menu">Blank</span></a>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                href="error-404.html" aria-expanded="false"><i class="mdi mdi-alert-outline"></i><span
                  class="hide-menu">404</span></a>
            </li>
            <li class="text-center p-40 upgrade-btn">
              <a href="" class="btn btn-block btn-danger text-white" target="_blank">Upgrade to Pro</a>
            </li>
          </ul>

        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- Page wrapper  -->

    <div class="page-wrapper">
      <!-- Bread crumb and right sidebar toggle -->
      <div class="page-breadcrumb">
        <div class="row align-items-center">
          <div class="col-5">
            <h4 class="page-title">Dashboard</h4>
            <div class="d-flex align-items-center">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-7">
            <div class="text-right upgrade-btn">
              <a href="" class="btn btn-danger text-white" target="_blank">Upgrade to Pro</a>
            </div>
          </div>
        </div>
      </div>

      {{ $slot }}

      <footer class="footer text-center">
        &copy; Pacho Design - All Rights Reserved Developed by <a href="https://softechdev.netlify.app">Kum
          Jude Tem</a>.
      </footer>
    </div>
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
  <!--Custom JavaScript -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!--This page JavaScript -->
  <!--chartis chart-->
  <script src="{{ asset('assets/js/chartist.min.js') }}"></script>
  <script src="{{ asset('assets/js/chartist-plugin-tooltip.min.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard1.js') }}"></script>

  @livewireScripts
</body>

</html>
