@section('header')
    <script src="{{ asset('assets/js/custom/user/logout.js') }}"></script>
@endsection
    @include('layout.partials.header')
<div class="container-scroller">
    @include('layout.partials.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('layout.partials.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
@include('layout.partials.footer')
