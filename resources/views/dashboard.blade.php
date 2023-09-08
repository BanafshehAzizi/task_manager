@section('header')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/dashboard.css') }}">
@endsection
@extends('layout.index')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span>Dashboard</h3>
    </div>
{{--    <div class="row">
        <div class="col-md-12 grid-margin stretch-card text-right">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-white mb-5">
                    <div class="card-body">
                        <ul class="list-unstyled" id="articles">

                        </ul>

                    </div>
                </div>

            </div>
        </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/custom/article/dashboard.js') }}"></script>
@endsection
