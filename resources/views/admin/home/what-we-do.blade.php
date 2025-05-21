<div id="tab3" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">What WE DO</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('about.index') }}">About</a>
                        </li>
                        <li class="breadcrumb-item active">
                            What WE DO
                        </li>
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
                    <form id="whatWedoFormSubmit" enctype="multipart/form-data">
                        @csrf
                        <input type ="hidden" id ="what_we_do_id" name="what_we_do_id" class="what_we_do_id"
                            value="{{ optional($whatWedo)->id }}">
                        <!-- Type -->
                        {{-- <div class="mb-3">
                            <label for="type">Section Type <span class="text-danger">*</span></label>
                            <select name="type" id="type" class="form-control">
                                <option value="whatwedo">What We Do</option>
                                <option value="easystep">Easy Step</option>
                            </select>
                            <span class="error-validation type-validation"></span>
                        </div> --}}

                        <!-- Title -->
                        <div class="mb-3">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter title"
                                value="{{ optional($whatWedo)->title }}">
                            <span class="error-validation title-validation" style="color: red"></span>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description">{{ optional($whatWedo)->description }}</textarea>

                            <span class="error-validation what-description-validation" style="color: red"></span>
                        </div>

                        <!-- Icon Upload -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image<span style="color:#ff0000">*</span></label>
                            <br>
                            <div class="logo-wrapper">
                                <img alt="Logo"
                                    src="{{ $whatWedo->WhatImages['preview'] ?? asset('admin/images/no-image.png') }}"
                                    class="logo-image avatar-md img-thumbnail image_class whatImage" id="whatImage"
                                    style="object-fit: contain;">
                                <div class="edit-icon" onclick="triggerWhatImageFileInput()">
                                    <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                        alt="Edit">
                                </div>
                            </div>
                            <span class="image-validation error-validation" style="color:red;"></span>
                            <input type="file" id="what_image" name="what_image" class="file-input" accept="image/*"
                                onchange="previewWhatImage(event)">
                        </div>
                        <!-- Easy Step Fields -->
                        <div id="easyStepFields">
                            <div class="mb-3">
                                <label>Title One</label>
                                <input type="text" name="title_one" placeholder="Enter Title" class="form-control"
                                    value="{{ optional($whatWedo)->title_one }}">
                            </div>
                            <div class="mb-3">
                                <label>Paragraph One</label>
                                <textarea name="para_one" placeholder="Enter Description" class="form-control">{{ optional($whatWedo)->para_one }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Title Two</label>
                                <input type="text" name="title_two" placeholder="Enter Title" class="form-control"
                                    value="{{ optional($whatWedo)->title_two }}">
                            </div>
                            <div class="mb-3">
                                <label>Paragraph Two</label>
                                <textarea name="para_two" placeholder="Enter Description" class="form-control">{{ optional($whatWedo)->para_two }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Title Three</label>
                                <input type="text" placeholder="Enter Title" name="title_three" class="form-control"
                                    value="{{ optional($whatWedo)->title_three }}">
                            </div>
                            <div class="mb-3">
                                <label>Paragraph Three</label>
                                <textarea name="para_three" placeholder="Enter Description" class="form-control">{{ optional($whatWedo)->para_three }}</textarea>
                            </div>

                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('whatwedo.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
