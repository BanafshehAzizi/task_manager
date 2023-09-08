@include('layout.partials.header')
<body>
<header>
    <div class="toast align-items-center text-white bg-primary border-0 position-fixed" role="alert"
         aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
        </div>
    </div>
</header>
<section>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class='notification-wrapper text-right'
                             style='position: fixed; top: 10px; right: 10px; z-index: 999999999999999;width: 220px;'>
                        </div>
                        <form class="pt-3" id="login_form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Email" name="email" id="email"
                                       class="form-control form-control-lg" required>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="password" name="password" id="password"
                                       class="form-control form-control-lg" required>
                            </div>
                            <div class="mt-3">
                                <button
                                    class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                    id="login_button" type="button" onclick="login()">
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-4 font-weight-light"> Don't have an account? <a
                                href="{{route('view-register')}}" class="text-primary">Create</a>
                        </div>
                    </div>
                </div>
            </div>
</section>
            @section('script')
                <script src="{{ asset('assets/js/custom/login.js') }}"></script>
@endsection
@include('layout.partials.footer')
