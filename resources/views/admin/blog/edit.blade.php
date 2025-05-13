@extends('admin.layout.app')
@section('title')
    {{ 'Blog | Veuz' }}
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
        rel="stylesheet">
    <style>
        .switch.btn.btn-primary {
            width: 65.4688px !important;
        }

        .select2-container .select2-selection--single {
            height: 37px !important;
        }

        .select2-container .select2-selection--multiple {
            min-height: 37px !important;
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
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Blog</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Blog</li>
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

                            <form class="formSubmit" data-content=" " id="formSubmit">
                                @csrf
                                <input type="hidden" class="blog_id" name="blog_id" value="{{ $blog->id }}"
                                    id="blog_id">
                                <div class="modal-body p-4">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label for="title">Title<span style="color:#ff0000">*</span></label>
                                                <input id="title" name="title" type="text"
                                                    class="form-control title" value="{{ $blog->title }}"
                                                    placeholder="Enter Title">
                                                <span class="title-validation error-validation" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <label for="formFile" class="form-label">Main Image<span
                                                    style="color:#ff0000">*</span></label>
                                            <br>
                                            <small class="text-red">Size Recommended:380x250px <br> Maximum File Size Limit
                                                is 2MB</small>
                                            <div class="logo-wrapper mb-3">
                                                <img alt="Logo"
                                                    src="@if ($blog->MainImages) {{ $blog->MainImages->getUrl('preview') }} @else {{ asset('admin/images/no-image.png') }} @endif"
                                                    class="logo-image avatar-md img-thumbnail image_class mainPreview"
                                                    id="mainPreview" style="object-fit: contain;">
                                                <div class="edit-icon" onclick="triggerMainFileInput()">
                                                    <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                                        alt="Edit">
                                                </div>
                                            </div>
                                            <input type="file" id="main-input" name="main_image" class="file-input"
                                                accept="image/*" onchange="previewMain(event)">
                                            <span class="main_image-validation error-validation" style="color:red;"></span>

                                            <label for="title">Image Alt </label>
                                            <input id="alt" name="alt" type="text"
                                                class="form-control alt mb-3" placeholder="Enter Alt"
                                                value="{{ $blog->alt }}">
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <label for="formFile" class="form-label">Inner Image<span
                                                    style="color:#ff0000">*</span></label>
                                            <br>
                                            <small class="text-red">Size Recommended:1920x1280px <br> Maximum File Size
                                                Limit is 2MB</small>
                                            <div class="logo-wrapper mb-3">
                                                <img alt="Logo"
                                                    src="@if ($blog->InnerImages) {{ $blog->InnerImages->getUrl('preview') }} @else {{ asset('admin/images/no-image.png') }} @endif"
                                                    class="logo-image avatar-md img-thumbnail image_class innerPreview"
                                                    id="innerPreview" style="object-fit: contain;">
                                                <div class="edit-icon" onclick="triggerInnerFileInput()">
                                                    <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                                        alt="Edit">
                                                </div>
                                            </div>
                                            <input type="file" id="inner-input" name="inner_image" class="file-input"
                                                accept="image/*" onchange="previewInner(event)">
                                            <span class="inner_image-validation error-validation" style="color:red;"></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="tag">Tags<span style="color:#ff0000">*</span></label>
                                                <select class="select2 form-control tag" multiple="multiple" id="tag"
                                                    name="tag_ids[]" data-placeholder="Select Tag"
                                                    aria-placeholder="Select Tag">
                                                    @if ($tags)
                                                        @foreach ($tags as $tag)
                                                            <option @if ($tag->id == $blog->tag_id) selected @endif
                                                                @if ($blog->multipleTag($blog->id, $tag->id)) selected @endif
                                                                value="{{ $tag->id }}">{{ $tag->tag_title_en }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="tag-validation error-validation" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="category">Category<span style="color:#ff0000">*</span></label>
                                                <select class="select2 form-control category" multiple="multiple"
                                                    id="category" name="category_ids[]"
                                                    data-placeholder="Select Category" aria-placeholder="Select Category">
                                                    @if ($categories)
                                                        @foreach ($categories as $category)
                                                            <option @if ($category->id == $blog->category_id) selected @endif
                                                                @if ($blog->multipleCategory($blog->id, $category->id)) selected @endif
                                                                value="{{ $category->id }}">{{ $category->title_en }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="category-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="author">Author<span style="color:#ff0000">*</span></label>
                                                <input id="author" name="author" type="text"
                                                    class="form-control author" value="{{ $blog->author }}"
                                                    placeholder="Enter Author">
                                                <span class="author-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="date">Publish Date<span
                                                        style="color:#ff0000">*</span></label>
                                                <input id="date" name="date" type="text"
                                                    class="form-control date"
                                                    value="{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}"
                                                    placeholder="DD-MM-YYYY">
                                                <span class="date-validation error-validation" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label for="description">Description<span
                                                        style="color:#ff0000">*</span></label>
                                                <textarea id="description" name="description" rows="5" class="form-control description"
                                                    placeholder="Enter Description">{{ $blog->description }}</textarea>
                                                <span class="description-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="meta_title">Meta Title</label>
                                                <input id="meta_title" name="meta_title" type="text"
                                                    class="form-control meta_title" value="{{ $blog->meta_title }}"
                                                    placeholder="Enter Meta Title">
                                                <span class="meta_title-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="meta_keyword">Meta Keyword</label>
                                                <input id="meta_keyword" name="meta_keyword" type="text"
                                                    class="form-control meta_keyword" value="{{ $blog->meta_keyword }}"
                                                    placeholder="Enter Meta Keyword">
                                                <span class="meta_keyword-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea id="meta_description" name="meta_description" rows="5" class="form-control meta_description"
                                                    placeholder="Enter Meta Description">{{ $blog->meta_description }}</textarea>
                                                <span class="meta_description-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer p-4">
                                    <a href="{{ route('blog.index') }}" style="margin-right: 20px">
                                        <button type="button" class="btn btn-danger waves-effect"
                                            data-bs-dismiss="modal">Close</button>
                                    </a>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light"
                                        id="blog-btn">Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
    </script>
    <script>
        CKEDITOR.replace('description', {
            format_tags: 'p;h1;h2;h3;h4;h5;h6;pre'

        });
    </script>
    <script>
        function triggerMainFileInput() {
            document.getElementById('main-input').click();
        }

        function previewMain(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('mainPreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        function triggerInnerFileInput() {
            document.getElementById('inner-input').click();
        }

        function previewInner(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('innerPreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#date').datetimepicker({
                format: 'DD-MM-YYYY',
            });

            $('#formSubmit').submit(function(e) {
                e.preventDefault();
                $("#loader").show();
                var description = CKEDITOR.instances['description'].getData();
                $('#formSubmit').data('content', 'admin/blog/update');
                var dataContent = $(this).data('content');
                var formData = new FormData(this);
                formData.append('description', description);
                $('.error-validation').html('');

                $.ajax({
                    type: 'POST',
                    url: base_url + dataContent,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        $("#formSubmit")[0].reset();
                        $("#loader").hide();
                        Swal.fire({
                            title: data.title,
                            text: data.message,
                            icon: data.icon,
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/blog';
                            }
                        });
                    },
                    error: function(data) {
                        $("#loader").hide();
                        console.log(data.responseJSON.errors);
                        var title = data.responseJSON.errors.title;
                        var priority = data.responseJSON.errors.priority;
                        var main_image = data.responseJSON.errors.main_image;
                        var inner_image = data.responseJSON.errors.inner_image;
                        var tag = data.responseJSON.errors.tag_ids;
                        var category = data.responseJSON.errors.category_ids;
                        var author = data.responseJSON.errors.author;
                        var date = data.responseJSON.errors.date;
                        var description = data.responseJSON.errors.description;

                        $('.title-validation').html(title);
                        $('.priority-validation').html(priority);
                        $('.main_image-validation').html(main_image);
                        $('.inner_image-validation').html(inner_image);
                        $('.tag-validation').html(tag);
                        $('.category-validation').html(category);
                        $('.author-validation').html(author);
                        $('.date-validation').html(date);
                        $('.description-validation').html(description);
                    }
                });
            });
        });
    </script>
@endsection
