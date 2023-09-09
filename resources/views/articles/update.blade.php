@extends('layout.index')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span>Update Article</h3>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="message mb-3 alert-info">

                    </div>
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
                            <select class="form-control" id="author_id" name="author_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                        </div>
                        <button type="button" class="btn btn-gradient-primary me-2" onclick="update()">Submit</button>
                    </form>
                    <div class="card-body">
                        <form id="FileForm" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control" name="files[]" id="files[]" multiple>
                                <button type="button" onclick="insertFile()" id="addImageButton" class="btn btn-info">upload
                                </button>
                            </div>
                            <div id="file_message"></div>
                            <div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/custom/article/articles.js') }}"></script>
    <script src="{{ asset('assets/js/moments/moment.min.js') }}"></script>
@endsection
