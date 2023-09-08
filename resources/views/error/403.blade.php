@section('title')
    دسترسی غیرمجاز
@endsection
@extends('admin.layout.app')
@section('content')
    <div class="page-content container-fluid">
        <div class="col-12">
            <div class="card d-block">
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <img src="{{ asset('images/403-page.png') }}" alt="دسترسی غیرمجاز">
                        </div>
                        <div class="row justify-content-center mt-2">
                            <h2>{{ $exception->getMessage() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

