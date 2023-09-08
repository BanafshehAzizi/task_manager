@extends('layout.index')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span>Create Article</h3>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Published Date</label>
                            <input type="datetime-local" class="form-control" id="published_at" name="published_at" placeholder="Published Date">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Author</label>
                            <select class="form-control" id="author" name="author">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                        </div>
                        <button type="button" class="btn btn-gradient-primary me-2" onclick="insert">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/custom/article/dashboard.js') }}"></script>
@endsection
