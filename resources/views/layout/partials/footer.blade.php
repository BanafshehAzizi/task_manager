<footer class="footer">
    <div class="d-sm-flex justify-content-center">
        Copyright © 2023
    </div>
</footer>
</div>
</div>
</div>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>


<script src="{{ asset('assets/js/jquery/jquery.form.js') }}"></script>

{{--<script src="{{ asset('assets/js/jquery-form-validator/lang/fa.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery-form-validator/jquery.form-validator.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery.form.js') }}"></script>--}}

{{--<script src="{{ asset('assets/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>--}}

{{--<script src="{{ asset('assets/js/bootstrap-table/bootstrap-table.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/bootstrap-table/bootstrap-table-fa-IR.min.js') }}"></script>--}}

{{--<script>--}}
    {{--var AlertProccessWait = '<span class="col-md-12 mb-3 text-center process-wait" ><i class="fa fa-spinner fa-pulse fa-1x ml-1"></i>لطفا صبر کنید...</span>';--}}
    {{--var AlertTokenMismatch = '<div class="alert alert-danger message_alert" role="alert"><i class="fa fa-exclamation-triangle ml-2"></i>زمان اعتبار فرم به پایان رسیده لطفا صفحه را مجددا صفحه را باز کنید.</div>';--}}
    {{--var startAlertDanger = '<div class="alert alert-danger message_alert" role="alert"><i class="fa fa-exclamation-triangle mx-2"></i>';--}}
    {{--var startAlertSuccess = '<div class="alert alert-success message_alert" role="alert"><i class="fa fa-check mx-2"></i>';--}}
    {{--var endAlert = '</div>';--}}
    {{--function logout_admin() {--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route('logout')}}",--}}
    {{--        type: "POST",--}}
    {{--        dataType: 'json',--}}
    {{--        data : {"_token": "{{ csrf_token() }}"},--}}
    {{--        success: function (data) {--}}

    {{--            if (data.func_status == "success") {--}}
    {{--                window.location = data.func_url;--}}
    {{--            }--}}
    {{--            if (data.func_status == "error") {--}}
    {{--                alert(data.func_message);--}}
    {{--            }--}}
    {{--        },--}}
    {{--        error: function (error) {--}}
    {{--            if(error.status == 419){--}}
    {{--                alert(AlertTokenMismatch);--}}
    {{--            }--}}
    {{--            console.log(error);--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}
{{--</script>--}}
@yield('script')
</body>
</html>
