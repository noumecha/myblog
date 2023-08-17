<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/png/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('/css/chartist/chartist.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('/css/admin/style.min.css') }}" rel="stylesheet">
    <title>@yield('title', 'Admin - Simple Blog')</title>
</head>
<!-- body -->

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{ route("home.index") }}">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('/img/logo-icon.png') }}" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{ asset('/img/logo-light-icon.png') }}" alt="homepage"
                                class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('/img/logo-text.png') }}" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{ asset('/img/logo-light-text.png') }}" class="light-logo"
                                alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('/img/users/1.jpg') }}" alt="user"
                                    class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
                                <div class="user-pic"><img src="{{ asset('img/users/1.jpg')}}" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium">Welcome back {{ auth()->user()->getName() }}<i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email">{{ auth()->user()->getEmail() }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-user m-r-5 m-l-5"></i> My Profile
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-wallet m-r-5 m-l-5"></i> My Balance
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-email m-r-5 m-l-5"></i> Inbox
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Account Setting
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <li class="p-15 m-t-10">
                        @if ( auth()->user()->getRole() == 'admin')
                            <a href="{{ route("admin.user.index") }}"
                                class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center">
                                <i class="bi bi-person-plus"></i> <span class="hide-menu m-l-5">Create New User</span>
                            </a>
                            <a href="{{ route("admin.article.index") }}"
                                class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center">
                                <i class="bi bi-plus"></i> <span class="hide-menu m-l-5">Create New Article</span>
                            </a>
                        @else
                            <a href="{{ route("admin.article.index") }}"
                                class="btn d-block w-100 create-btn text-white no-block d-flex align-items-center">
                                <i class="bi bi-plus"></i> <span class="hide-menu m-l-5">Create New Article</span>
                            </a>
                        @endif
                        </li>
                        <!-- User Profile-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin"
                                aria-expanded="false"><i class="bi bi-house"></i><span
                                    class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin"
                                aria-expanded="false"><i class="bi bi-person"></i><span
                                    class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            @if ( auth()->user()->getRole() == 'admin')
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route("admin.user.index") }}"
                                    aria-expanded="false"><i class="bi bi-person-plus"></i><span
                                        class="hide-menu">Users</span>
                                </a>
                            @endif
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.categorie.index') }}"
                                aria-expanded="false"><i class="bi bi-bookmarks-fill"></i><span
                                    class="hide-menu">Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.tag.index') }}"
                                aria-expanded="false"><i class="bi bi-tag"></i><span
                                    class="hide-menu">Tags</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route("admin.article.index") }}"
                                aria-expanded="false"><i class="bi bi-plus-square-fill"></i><span
                                    class="hide-menu">Articles</span>
                            </a>
                        </li>
                        <li class="text-center p-40 upgrade-btn">
                            <a href="/home" class="btn d-block w-100 btn-danger text-white" target="_blank">
                                <i class="bi bi-arrow-bar-left"></i>
                                Go Back Home
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/xtremeadmin/" class="btn btn-danger text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    <!-- script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script-->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
                ckfinder: {
                    uploadUrl: `{{ route('upload.image').'?_token='.csrf_token() }}`
                }
            })
            .then(editor => {
                console.log( editor);
            })
            .catch( error => {
                console.error( error );
            });
    </script>
    <script src="{{ asset('/js/tags.js') }}">
    </script>
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('/js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('/js/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('/js/chartist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('/js/pages/dashboard1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
