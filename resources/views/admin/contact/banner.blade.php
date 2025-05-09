<div id="tab1" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Banner</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('contact.index') }}">Contact</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Banner
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
                    <form class="bannerFormSubmit" id="bannerFormSubmit">
                        @csrf
                        <input type="hidden" class="banner_id" name="banner_id" id="banner_id"
                            value="{{ $banner->id ?? '' }}">
                        <input type="hidden" class="banner_page" name="banner_page" id="banner_page" value="contact">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="banner_title">Title</label>
                                    <input id="banner_title" name="banner_title" type="text"
                                        class="form-control banner_title" placeholder="Title"
                                        value="{{ $banner->title ?? '' }}">
                                    <span class="banner_title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-12">
                                <label for="formFile" class="form-label">Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                        src="{{ $banner->images->preview ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class bannerPreview1"
                                        id="bannerPreview1" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerBanner1FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <span class="banner_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="banner1-input" name="banner_image" class="file-input"
                                    accept="image/*" onchange="previewBanner1(event)">

                                <div class="mb-4 mt-3">
                                    <label for="name">Image Alt</label>
                                    <input name="banner_alt" type="text" value="{{ $banner->alt ?? '' }}"
                                        class="form-control" id="image_alt" placeholder="Enter Alt">
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
