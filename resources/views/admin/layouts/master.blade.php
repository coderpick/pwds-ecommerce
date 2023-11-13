<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        @include('admin.layouts.partials.header')
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        @include('admin.layouts.partials.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            
            @yield('content')

           {{-- footer --}}
           @include('admin.layouts.partials.footer')
        </div>
    </div>
  
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    @include('admin.layouts.partials._script')
</body>

</html>