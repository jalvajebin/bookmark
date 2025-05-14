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
    <style>
        /* Make the editor wider */
        .ck-editor__editable_inline {
            min-height: 150px;

        }

        /* If you want to control the container width as well */
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Blog</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Create Blog</li>
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
                                <input type="hidden" class="blog_id" name="blog_id" id="blog_id">
                                <div class="modal-body p-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label for="title">Title<span style="color:#ff0000">*</span></label>
                                                <input id="title" name="title" type="text"
                                                    class="form-control title" placeholder="Enter Title">
                                                <span class="title-validation error-validation" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <label for="formFile" class="form-label">Main Image<span
                                                    style="color:#ff0000">*</span></label>
                                            <br>
                                            <small class="text-red">Size Recommended:380x250px <br> Maximum File Size Limit
                                                is 2MB</small>
                                            <div class="logo-wrapper mb-4">
                                                <img alt="Logo" src="{{ asset('admin/images/no-image.png') }}"
                                                    class="logo-image avatar-md img-thumbnail image_class mainPreview"
                                                    id="mainPreview" style="object-fit: contain;">
                                                <div class="edit-icon" onclick="triggerMainFileInput()">
                                                    <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                                        alt="Edit">
                                                </div>
                                                <span class="main_image-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                            <input type="file" id="main-input" name="main_image" class="file-input"
                                                accept="image/*" onchange="previewMain(event)">

                                            <label for="title">Image Alt </label>
                                            <input id="alt" name="alt" type="text"
                                                class="form-control alt mb-3" placeholder="Enter Alt">
                                        </div>
                                        <div class="col-sm-6 col-6">
                                            <label for="formFile" class="form-label">Inner Image<span
                                                    style="color:#ff0000">*</span></label>
                                            <br>
                                            <small class="text-red">Size Recommended:1920x1280px <br> Maximum File Size
                                                Limit is 2MB</small>
                                            <div class="logo-wrapper mb-4">
                                                <img alt="Logo" src="{{ asset('admin/images/no-image.png') }}"
                                                    class="logo-image avatar-md img-thumbnail image_class innerPreview"
                                                    id="innerPreview" style="object-fit: contain;">
                                                <div class="edit-icon" onclick="triggerInnerFileInput()">
                                                    <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                                        alt="Edit">
                                                </div>
                                                <span class="inner_image-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                            <input type="file" id="inner-input" name="inner_image" class="file-input"
                                                accept="image/*" onchange="previewInner(event)">
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="tag">Tags<span style="color:#ff0000">*</span></label>
                                                <select class="select2 form-control tag" multiple="multiple" id="tag"
                                                    name="tag_ids[]" data-placeholder="Select Tag"
                                                    aria-placeholder="Select Tag">
                                                    @if ($tagLoops)
                                                        @foreach ($tagLoops as $tagLoop)
                                                            <option value="{{ $tagLoop->id }}">
                                                                {{ $tagLoop->tag_title_en }}
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
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->title_en }}
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
                                                    class="form-control author" placeholder="Enter Author">
                                                <span class="author-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="date">Publish Date<span
                                                        style="color:#ff0000">*</span></label>
                                                <input id="date" name="date" type="text"
                                                    class="form-control date" placeholder="DD-MM-YYYY">
                                                <span class="date-validation error-validation" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label for="description">Description<span
                                                        style="color:#ff0000">*</span></label>
                                                <textarea id="description" name="description" rows="5" class="form-control description"
                                                    placeholder="Enter Description"></textarea>
                                                <span class="description-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="meta_title">Meta Title</label>
                                                <input id="meta_title" name="meta_title" type="text"
                                                    class="form-control meta_title" placeholder="Enter Meta Title">
                                                <span class="meta_title-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="meta_keyword">Meta Keyword</label>
                                                <input id="meta_keyword" name="meta_keyword" type="text"
                                                    class="form-control meta_keyword" placeholder="Enter Meta Keyword">
                                                <span class="meta_keyword-validation error-validation"
                                                    style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-4">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea id="meta_description" name="meta_description" rows="5" class="form-control meta_description"
                                                    placeholder="Enter Meta Description"></textarea>
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
        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#description'), {
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|', 'heading',
                            '|', 'bold', 'italic', 'underline', 'strikethrough',
                            '|', 'link', 'uploadImage', 'insertTable', 'blockQuote', 'codeBlock',
                            '|', 'bulletedList', 'numberedList',
                            '|', 'fontColor', 'fontBackgroundColor', 'fontSize',
                            '|', 'alignment',
                            '|', 'horizontalLine', 'specialCharacters',
                            '|', 'removeFormat'
                        ]
                    },
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'toggleImageCaption',
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn', 'tableRow', 'mergeTableCells',
                            'tableProperties', 'tableCellProperties'
                        ]
                    },
                    fontColor: {
                        colors: [{
                                color: 'black',
                                label: 'Black'
                            },
                            {
                                color: 'white',
                                label: 'White'
                            },
                            {
                                color: '#f44336',
                                label: 'Red'
                            },
                            {
                                color: '#4caf50',
                                label: 'Green'
                            },
                            {
                                color: '#2196f3',
                                label: 'Blue'
                            },
                            {
                                color: '#ff9800',
                                label: 'Orange'
                            },
                            {
                                color: '#9c27b0',
                                label: 'Purple'
                            }
                        ]
                    },
                    fontBackgroundColor: {
                        colors: [{
                                color: 'black',
                                label: 'Black'
                            },
                            {
                                color: 'white',
                                label: 'White'
                            },
                            {
                                color: '#f44336',
                                label: 'Red'
                            },
                            {
                                color: '#4caf50',
                                label: 'Green'
                            },
                            {
                                color: '#2196f3',
                                label: 'Blue'
                            },
                            {
                                color: '#ff9800',
                                label: 'Orange'
                            },
                            {
                                color: '#9c27b0',
                                label: 'Purple'
                            }
                        ]
                    },
                    fontSize: {
                        options: [
                            'tiny',
                            'small',
                            'default',
                            'big',
                            'huge'
                        ]
                    }
                })
                .then(editor => {
                    // Set initial data from textarea
                    editor.setData(document.querySelector('#description').value);

                    // Update textarea on editor change
                    editor.model.document.on('change:data', () => {
                        document.querySelector('#description').value = editor
                            .getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>


    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: [
                    'cut', 'copy', 'paste', 'undo', 'redo',
                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript',
                    'bulletedList', 'numberedList', 'outdent', 'indent',
                    'blockQuote', 'link', 'unlink', 'imageUpload', 'insertTable',
                    'code', 'codeBlock', 'horizontalLine', 'specialCharacters',
                    'heading', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
                    'alignment', 'removeFormat', 'sourceEditing'
                ],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        },
                        {
                            model: 'codeBlock',
                            view: 'pre',
                            title: 'Code Block',
                            class: 'ck-heading_pre'
                        }
                    ]
                },
                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script> --}}

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

            CKEDITOR.replace('description');


            $('#formSubmit').submit(function(e) {
                e.preventDefault();
                $("#loader").show();
                var description = CKEDITOR.instances['description'].getData();
                $('#formSubmit').data('content', 'admin/blog/store');
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
