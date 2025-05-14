@extends('admin.layout.app')
@section('title')
    {{ 'Blog | Veuz' }}
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        td a {
            color: #495057;
        }

        .logo-container {
            text-align: center;
            margin-top: 20px;
        }

        .logo-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 150px;
        }

        .logo-image {
            width: 100%;
            height: 100%;
            border: 2px solid #ccc;
            border-radius: 10px;
            object-fit: cover;
        }

        .edit-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: white;
            border: 1px solid #b1b1b1;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }

        .edit-icon img {
            width: 16px;
            height: 16px;
        }

        .file-input {
            display: none;
        }

        ul {
            list-style: none;
        }

        .tab-list {
            margin-left: 10px;
        }

        .tab-list.active {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list.active a {
            color: #14b0c4;
        }

        .tab-list a {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #0c6d78;
        }

        .tab-list:hover {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list a:hover {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #14b0c4;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page list -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="d-flex align-items-center m-0 p-0" id="tabs-nav">
                                <li class="tab-list">
                                    <a href="#tab2" class="m-2">Tag</a>
                                </li>
                                <li class="tab-list">
                                    <a href="#tab3" class="m-2">Category</a>
                                </li>
                                <li class="tab-list">
                                    <a href="#tab1" class="m-2">Blog</a>
                                </li>    
                                <li class="tab-list">
                                    <a href="#tab5" class="m-2">Blog Comments</a>
                                </li>
                                {{-- <li class="tab-list">
                                    <a href="#tab4" class="m-2">Seo</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page list -->
            <div id="tabs-content">
                <div id="tab1" class="tab-content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4>Blog</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Blog</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="top-hd-box mb-3">
                                        <h5 class="card-title">Blog List</h5>
                                        <div class="top-hd-box-right">
                                            <a href="/admin/blog/create" class="btn btn-success">Create
                                                New</a>
                                        </div>
                                    </div>
                                    <table id="myTable-blog" class="table table-bordered mb-3 dt-responsive  nowrap w-100">
                                        <thead style="background-color:#d3dae4;">
                                            <tr>
                                                <th scope="col" width="10px"
                                                    style="text-align: left; background-color:#d3dae4;">No</th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Title
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Main
                                                    Image
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Inner
                                                    Image
                                                </th>
                                                <th scope="col" width="10px" style="background-color:#d3dae4;">
                                                    Status
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="blog-result">
                                            @include('admin.blog.blogResult')
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4>Tag</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Tag</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="top-hd-box mb-3">
                                        <h5 class="card-title">Tag List</h5>
                                        <div class="top-hd-box-right">
                                            <a href="#" class="btn btn-success add-cntry create-tag-modal">Create
                                                New</a>
                                        </div>
                                    </div>
                                    <table id="myTable-tag" class="table table-bordered mb-3 dt-responsive  nowrap w-100">
                                        <thead style="background-color:#d3dae4;">
                                            <tr>
                                                <th scope="col" width="10px"
                                                    style="text-align: left; background-color:#d3dae4;">No</th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Tag Name
                                                </th>
                                                <th scope="col" width="10px" style="background-color:#d3dae4;">Status
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="tag-result">
                                            @include('admin.blog.tagResult')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab-content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4>Category</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Category</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="top-hd-box mb-3">
                                        <h5 class="card-title">Category List</h5>
                                        <div class="top-hd-box-right">
                                            <a href="#"
                                                class="btn btn-success add-cntry create-category-modal">Create
                                                New</a>
                                        </div>
                                    </div>
                                    <table id="myTable-category"
                                        class="table table-bordered mb-3 dt-responsive  nowrap w-100">
                                        <thead style="background-color:#d3dae4;">
                                            <tr>
                                                <th scope="col" width="10px"
                                                    style="text-align: left; background-color:#d3dae4;">No</th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">
                                                    Category
                                                    Name
                                                </th>
                                                <th scope="col" width="10px" style="background-color:#d3dae4;">
                                                    Status
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="category-result">
                                            @include('admin.blog.categoryResult')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab4" class="tab-content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Seo Settings</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active">Seo Settings</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="seoFormSubmit" data-id="{{ $seo->id }}" id="seoFormSubmit">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input id="meta_title" name="meta_title" type="text"
                                                        class="form-control meta_title" value="{{ $seo->meta_title }}"
                                                        placeholder="Meta Title">
                                                    <span class="meta_title-validation error-validation"
                                                        style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="meta_keyword">Meta Keyword</label>
                                                    <input id="meta_keyword" name="meta_keyword" type="text"
                                                        class="form-control meta_keyword" value="{{ $seo->meta_keyword }}"
                                                        placeholder="Meta Keyword">
                                                    <span class="meta_keyword-validation error-validation"
                                                        style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-4">
                                                    <label for="meta_description">Meta Description</label>
                                                    <textarea id="meta_description" name="meta_description" rows="5" class="form-control meta_description"
                                                        placeholder="Enter Meta Description">{{ $seo->meta_description }}</textarea>
                                                    <span class="meta_description-validation error-validation"
                                                        style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap left_side gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div id="tab5" class="tab-content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active">Comments</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="top-hd-box mb-3">
                                        <h5 class="card-title">Comment List</h5>
                                        <div class="top-hd-box-right">
                                            <a href="#" class="btn btn-danger"
                                                onclick="deleteBlogComment(event)">Delete</a>
                                        </div>
                                    </div>
                                    <table class="table table-bordered mb-3 dt-responsive  nowrap w-100"
                                        id="commentTable">
                                        <thead style="background-color:#d3dae4;">
                                            <tr>
                                                <th scope="col" width="10px"
                                                    style="text-align: left; background-color:#d3dae4;">No</th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Blog
                                                    Title
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Name
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Email
                                                    Address
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">
                                                    Message
                                                </th>
                                                <th scope="col" width="10px" style="background-color:#d3dae4;">
                                                    Status
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" id="categoryModal" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">
                        Create Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="formCategorySubmit" id="formCategorySubmit">
                    @csrf
                    <input type="hidden" class="category_id" name="category_id" id="category_id">
                    <div class="modal-body p-4">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label for="category_title">Title<span style="color:#ff0000">*</span></label>
                                    <input id="category_title" name="category_title" type="text"
                                        class="form-control category_title" placeholder="Enter Category">
                                    <span class="category_title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer p-4">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="category-btn">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-xl" id="tagModal" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">
                        Create Tag
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="formTagSubmit" id="formTagSubmit">
                    @csrf
                    <input type="hidden" class="tag_id" name="tag_id" id="tag_id">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label for="tag_title">Title<span style="color:#ff0000">*</span></label>
                                    <input id="tag_title" name="tag_title" type="text" class="form-control tag_title"
                                        placeholder="Enter Tag">
                                    <span class="tag_title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-4">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" id="tag-btn">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('admin.blog.js.datatable')
    <script>
        $(document).ready(function() {
            dataTable();
            $('#tabs-nav li:first-child').addClass('active');
            $('.tab-content').hide();
            $('.tab-content:first').show();

            $('#tabs-nav li').click(function() {
                $('#tabs-nav li').removeClass('active');
                $(this).addClass('active');
                $('.tab-content').hide();

                var activeTab = $(this).find('a').attr('href');
                $(activeTab).fadeIn();
                return false;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable-blog').DataTable();
            $('#myTable-tag').DataTable();
            $('#myTable-category').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.create-tag-modal').on('click', function() {
                $('#tagModal').modal('show');
                $('.modal-title').text('Create');
                $('#tag-btn').text('Save');
                $('#formTagSubmit').trigger("reset");
                $('#formTagSubmit').data('content', 'admin/blog/tag/create');
                $('.error-validation').html('');
            });

            $('#formTagSubmit').submit(function(e) {
                e.preventDefault();
                $("#loader").show();
                var dataContent = $(this).data('content');
                var formData = new FormData(this);
                $('.error-validation').html('');
                $.ajax({
                    type: 'POST',
                    url: base_url + dataContent,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#formTagSubmit")[0].reset();
                        $("#tagModal").modal('hide');
                        blogResult();
                        $("#loader").hide();
                        var message = data.message;
                        if (data.status == true) {
                            Swal.fire(
                                'Success',
                                message,
                                'success'
                            );
                        } else if (data.status == false) {
                            Swal.fire(
                                'Error',
                                message,
                                'error'
                            );
                        }
                    },
                    error: function(data) {
                        console.log(data);
                        $("#loader").hide();
                        var tag_title = data.responseJSON.errors.tag_title;
                        $('.tag_title-validation').html(tag_title);
                    }
                });
            });
        });

        function blogResult() {
            $.ajax({
                type: 'get',
                url: "{{ route('blog.index') }}",
                data: {},
                success: function(result) {
                    $('.blog-result').html(result.blogHtml);
                    $('.category-result').html(result.categoryHtml);
                    $('.tag-result').html(result.tagHtml);
                    $('#myTable-blog').DataTable();
                    $('#myTable-tag').DataTable();
                    $('#myTable-category').DataTable();
                },
                error: function() {

                }
            });
        }

        $(document).on('click', '.deleteTagIcon', function(e) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var id = $(this).data('id');
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "get",
                        url: base_url + 'admin/blog/tag/delete/' + id,

                        data: {},
                        success: function(response) {
                            blogResult();
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                        }
                    });
                }
            })
        });

        $(document).on('click', '.editTagIcon', function() {
            $('.error-validation').html('');
            $('.modal-title').text('Edit');
            $('#tag-btn').text('Save');
            $("#loader").show();
            var id = $(this).data('id');
            $('#formTagSubmit').data('content', 'admin/blog/tag/update/' + id);

            $.ajax({
                type: "get",
                url: base_url + 'admin/blog/tag/edit/' + id,
                data: {},
                success: function(res) {
                    console.log(res);
                    $('#tagModal').modal('show');
                    $("#loader").hide();
                    var result = res.data;
                    var tag_id = result.id;
                    var tag_title = result.tag_title_en;
                    $('.tag_id').val(tag_id);
                    $('.tag_title').val(tag_title);
                },
                error: function(result) {
                    $("#loader").hide();
                }

            })

        });

        $(document).on('click', '.statusTag', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).val();
            $.ajax({
                type: "post",
                data: {
                    id: id
                },
                url: base_url + "admin/blog/tag/status-change",
                success: function(response) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status, 1);
                },
                error: function() {
                    console.log('error');
                }
            });
        });

        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.create-category-modal').on('click', function() {
                $('#categoryModal').modal('show');
                $('.modal-title').text('Create');
                $('#category-btn').text('Save');
                $('#formCategorySubmit').trigger("reset");
                $('#formCategorySubmit').data('content', 'admin/blog/category/create');
                $('.error-validation').html('');
            });

            $('#formCategorySubmit').submit(function(e) {
                e.preventDefault();
                $("#loader").show();
                var dataContent = $(this).data('content');
                var formData = new FormData(this);
                $('.error-validation').html('');
                $.ajax({
                    type: 'POST',
                    url: base_url + dataContent,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#formCategorySubmit")[0].reset();
                        $("#categoryModal").modal('hide');
                        blogResult();
                        $("#loader").hide();
                        var message = data.message;
                        if (data.status == true) {
                            Swal.fire(
                                'Success',
                                message,
                                'success'
                            );
                        } else if (data.status == false) {
                            Swal.fire(
                                'Error',
                                message,
                                'error'
                            );
                        }
                    },
                    error: function(data) {
                        console.log(data);
                        $("#loader").hide();
                        var category_title = data.responseJSON.errors.category_title;
                        $('.category_title-validation').html(category_title);
                    }
                });
            });
        });

        $(document).on('click', '.deleteCategoryIcon', function(e) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var id = $(this).data('id');
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "get",
                        url: base_url + 'admin/blog/category/delete/' + id,

                        data: {},
                        success: function(response) {
                            blogResult();
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                        }
                    });
                }
            })
        });

        $(document).on('click', '.editCategoryIcon', function() {
            $('.error-validation').html('');
            $('.modal-title').text('Edit');
            $('#category-btn').text('Save');
            $("#loader").show();
            var id = $(this).data('id');
            $('#formCategorySubmit').data('content', 'admin/blog/category/update/' + id);

            $.ajax({
                type: "get",
                url: base_url + 'admin/blog/category/edit/' + id,
                data: {},
                success: function(res) {
                    console.log(res);
                    $('#categoryModal').modal('show');
                    $("#loader").hide();
                    var result = res.data;
                    var category_id = result.id;
                    var category_title = result.title_en;
                    $('.category_id').val(category_id);
                    $('.category_title').val(category_title);
                },
                error: function(result) {
                    $("#loader").hide();
                }

            })

        });

        $(document).on('click', '.statusCategory', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).val();
            $.ajax({
                type: "post",
                data: {
                    id: id
                },
                url: base_url + "admin/blog/category/status-change",
                success: function(response) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status, 1);
                },
                error: function() {
                    console.log('error');
                }
            });
        });

        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '.deleteIcon', function(e) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var id = $(this).data('id');
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "get",
                        url: base_url + 'admin/blog/delete/' + id,

                        data: {},
                        success: function(response) {
                            blogResult();
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                        }
                    });
                }
            })
        });

        $(document).on('click', '.status', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).val();
            $.ajax({
                type: "post",
                data: {
                    id: id
                },
                url: base_url + "admin/blog/status-change",
                success: function(response) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status, 1);
                },
                error: function() {
                    console.log('error');
                }
            });
        });

        function statusChange(id, status) {
            $.ajax({
                type: "post",
                data: {
                    id: id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                url: "{{ route('blog.comment.status') }}",
                success: function(response) {
                    $('#commentTable').DataTable().ajax.reload();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.message, 1);
                },
                error: function() {
                    $('#commentTable').DataTable().ajax.reload();
                    console.log('error');
                }
            })
        }

        function deleteBlogComment(e, id = '') {
            e.preventDefault();
            let ids = '';
            if (id == '') {
                ids = $("input:checkbox[class=commentIds]:checked").map(function() {
                    return this.value;
                }).get();

                if (ids.length < 1) {
                    alertMessage('warning', 'Please select a row');
                    return;
                }
            } else {
                ids = [id];
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let route = "{{ route('blog.comment.delete') }}"
                    $.ajax({
                        type: 'POST',
                        url: route,
                        data: {
                            _token: "{{ csrf_token() }}",
                            ids: ids
                        },
                        dataType: "json",

                        beforeSend: function() {
                            $("#loader").show();
                        },
                        complete: function() {
                            $("#loader").hide();
                        },
                        success: function(data) {
                            $("#loader").hide();
                            if (data.success == true) {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                )
                                $('#commentTable').DataTable().ajax.reload();
                                $('.commentIds').prop('checked', false).removeAttr('checked');
                                $(".mulltiCheckBox").prop('checked', false).removeAttr('checked');
                                alertMessage(message, 'success');
                            } else {
                                Swal.fire(
                                    'Warning!',
                                    data.message,
                                    'warning'
                                )
                            }

                        },
                        error: function(data) {
                            $("#loader").hide();
                        }
                    });
                }
            })
        }
    </script>
@endsection
