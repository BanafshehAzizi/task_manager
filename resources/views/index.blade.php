@section('header')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/dashboard.css') }}">
    <script src="{{ asset('assets/js/custom/dashboard.js') }}"></script>
@endsection
@extends('admin.layout.index')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> میز کار </h3>
        {{--<nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="font-weight-bold">بازبینی</span> <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>--}}
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card text-right">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title  ">جستجوی گزارش</h4>
                    <div class="add-items d-flex">
                        <form method="post" id="search_report_form" class="col-7 p-0">
                            @csrf
                            <input type="text" class="form-control mb-3" name="date" id="datepicker"/>
                            <button type="submit" class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn"
                                    id="search_submit">جستجو
                            </button>
                        </form>
                    </div>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>


    {{--    <script src="{{ asset('assets/js/md-bootstrap/jquery.md.bootstrap.datetimepicker.js') }}"></script>--}}

    <!-- End custom js for this page -->
@endsection
