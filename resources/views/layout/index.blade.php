@include('admin.layout.partials.header')
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
@include('admin.layout.partials.navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
    @if(str_contains(url()->current(), 'date'))
        @include('admin.layout.partials.report_sidebar')
    @else
        @include('admin.layout.partials.sidebar')
    @endif
    <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
@include('admin.layout.partials.footer')
