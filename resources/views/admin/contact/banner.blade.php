<div id="tab1" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Banner</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Banner</li>
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
                    <form id="contactBannerForm">
                        @csrf
                        <input type="hidden" name="banner_id" id="banner_id" value="{{ $banner->id ?? '' }}">
                        <input type="hidden" name="page_name" id="page_name" value="{{ $banner->page_name ?? 'about-us' }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        value="{{ $banner->title ?? '' }}" class="form-control title"
                                        placeholder="Enter title">
                                    <span class="title_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-6">
                                <label for="formFile" class="form-label">Banner Image<span style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is 2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <img alt="Logo"
                                        src="{{ $banner->banners->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class" id="banner"
                                        style="object-fit: contain;">
                                    <div class="edit-icon" onclick="bannerInputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="bannerInput" name="banner" class="file-input"
                                    accept="image/*">
                                <span class="banner_validation error-validation" style="color:red;"></span>
                                <input id="alt" name="alt" type="text"
                                    class="form-control mb-3"value="{{ $banner->alt ?? '' }}" placeholder="Enter alt">
                            </div>

                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                onclick="addContactBanner(event)">{{ isset($banner) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
