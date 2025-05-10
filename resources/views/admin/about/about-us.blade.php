<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>About Us</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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
                    <form class="aboutUsFormSubmit" id="aboutUsFormSubmit">
                        @csrf
                        <input type="hidden" name="about_us_id" id="about_us_id" value="{{ $aboutUs->id ?? '' }}">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text" class="form-control title"
                                        placeholder="Title" value="{{ $aboutUs->title ?? '' }}">
                                    <span class="title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" rows="5" class="form-control description"
                                        placeholder="Enter Description">{{ $aboutUs->description ?? '' }}</textarea>
                                    <span class="description-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label">Image 1<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is 2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <img alt="Image1"
                                        src="{{ $aboutUs->images->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail imagePreview1" id="imagePreview1"
                                        style="object-fit: contain;">
                                    <div class="edit-icon" onclick="Image1InputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="image1" name="image1" class="file-input" accept="image/*"
                                    onchange="previewImage1(event)">
                                <span class="image1_validation error-validation" style="color:red;"></span>
                            </div>    
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="image1">Image1 Alt</label>
                                <input id="image1_alt" name="image1_alt" type="text" class="form-control"
                                    value="{{ $aboutUs->image1_alt ?? '' }}" placeholder="Enter alt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <label for="online_support_no">Online Support No</label>
                                <input id="online_support_no" name="online_support_no" type="text"
                                    class="form-control online_support_no" placeholder="Online Support No"
                                    value="{{ $aboutUs->online_support_number ?? '' }}">
                                <span class="online_support_no_validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                </div>
                <div class="d-flex flex-wrap left_side gap-2">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
