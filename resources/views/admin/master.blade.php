@include('admin.body.styles')
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
       @include('admin.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('admin.body.header')
        <!--end header -->
        
        <!--start page wrapper -->
        <div class="page-wrapper">
           @yield('main-content')
        </div>
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('admin.body.footer')
    </div>
    <!--end wrapper-->
@include('admin.body.scripts')