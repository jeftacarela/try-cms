
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dashboard Home</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ URL::to('images/1623797782.png') }}">
    <link href="{{ URL::to('../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ URL::to('../plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('../plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::to('../plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ URL::to('../plugins/morris/morris.css') }}">
    <link href="{{ URL::to('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ URL::to('assets/css/style.css?v=echo time()') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ URL::to('assets/css/style.css?v=').time() }}" rel="stylesheet" type="text/css">

    {{-- message toastr --}}
    {{-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
    <script src="{{ URL::to('assets/js/jquery224.min.js') }}"></script>
    {{-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{route('home')}}" class="logo">
                    <img src="{{ URL::to('images/1623797782.png') }}" class="logo-lg" alt="" height="25">
                </a>
            </div>
            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">
                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-account-circle" style="font-size: 20px;color: #2c3749"></i>Profile
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <!-- item-->                                
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle" style="color: #2c3749"></i>{{ auth()->user()->name }}</a>
                                <div class="dropdown-divider"></div>
                                
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            {{-- <i class="mdi mdi-menu"></i> --}}
                            <i class="mdi mdi-arrow-left"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Top Bar End -->

        @include('layouts.navbar')
      
        <!-- content -->
        @yield('content')
        <!-- End content -->
    </div>
    <!-- END wrapper -->

   <!-- jQuery  -->
   <script src="{{ URL::to('assets/js/jquery.min.js') }}"></script>
   <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ URL::to('assets/js/metismenu.min.js') }}"></script>
   <script src="{{ URL::to('assets/js/jquery.slimscroll.js') }}"></script>
   <script src="{{ URL::to('assets/js/waves.min.js') }}"></script>

   <script src="{{ URL::to('../plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

   <!-- Required datatable js -->
   <script src="{{ URL::to('../plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
   <!-- Buttons examples -->
   <script src="{{ URL::to('../plugins/datatables/dataTables.buttons.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/jszip.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/pdfmake.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/vfs_fonts.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.html5.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.print.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/buttons.colVis.min.js') }}"></script>
   <!-- Responsive examples -->
   <script src="{{ URL::to('../plugins/datatables/dataTables.responsive.min.js') }}"></script>
   <script src="{{ URL::to('../plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ URL::to('../plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::to('../plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::to('assets/pages/dashboard.init.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::to('assets/pages/datatables.init.js') }}"></script>

   <!-- App js -->
   <script src="{{ URL::to('assets/js/app.js') }}"></script>

    <!-- Update Project Modal js -->
   <script>
    $(document).on('click','.articleUpdate',function()
     {
         var _this = $(this).parents('tr');
         $('#id').val(_this.find('.id').text());
         $('#e_article').val(_this.find('.article').text());
         $('#e_video').val(_this.find('.video').text());
                 
     });
    </script>
</body>
</html>