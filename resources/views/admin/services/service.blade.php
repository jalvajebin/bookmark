<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Service</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('services.index') }}">Service</a>
                        </li>
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
                    <form class="serviceFormSubmit" id="serviceFormSubmit">
                        @csrf
                        <input type="hidden" class="service_id" name="service_id" id="service_id"
                               value="{{ $service->id ?? '' }}">

                        <div class="row">
                            <!-- Title -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text"
                                           class="form-control title" placeholder="Title"
                                           value="{{ $service->title ?? '' }}">
                                    <span class="title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                            <!-- Title 2 -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title_two">Title 2</label>
                                    <input id="title_two" name="title_two" type="text"
                                           class="form-control title_two" placeholder="Title"
                                           value="{{ $service->title_two ?? '' }}">
                                    <span class="title_two-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>


                            <!-- Description -->
<div class="col-sm-6">
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control description" rows="4"
                  placeholder="Enter description">{{ $service->discription ?? '' }}</textarea>
        <span class="description-validation error-validation" style="color:red;"></span>
    </div>
</div>

<!-- Description 2 -->
<div class="col-sm-6">
    <div class="mb-3">
        <label for="description_two">Description 2</label>
        <textarea id="description_two" name="description_two" class="form-control description_two" rows="4"
                  placeholder="Enter description two">{{ $service->discription_two ?? '' }}</textarea>
        <span class="description_two-validation error-validation" style="color:red;"></span>
    </div>
</div>


                            <!-- Image 1 -->
                            <div class="col-sm-12 col-6">
                                <label for="service_image" class="form-label">Image 1 <span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="servicePreview1" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('service_image').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="banner_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="service_image" name="service_image" class="file-input d-none"
                                       accept="image/*" onchange="previewServiceImage(event, 'servicePreview1')">
                            </div>

                            <!-- Image 2 -->
                            <div class="col-sm-12 col-6">
                                <label for="service_image_two" class="form-label">Image 2 <span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="servicePreview2" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('service_image_two').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="service_image_two-validation error-validation" style="color:red;"></span>
                                <input type="file" id="service_image_two" name="service_image_two" class="file-input d-none"
                                       accept="image/*" onchange="previewServiceImage(event, 'servicePreview2')">

                                <!-- Button Title -->
                                <div class="mb-4 mt-3">
                                    <label for="read_more">Button Title</label>
                                    <input name="read_more" type="text" value="{{ $service->read_more ?? '' }}"
                                           class="form-control" id="read_more" placeholder="Enter read more">
                                           <span class="read_more-validation error-validation" style="color:red;"></span>
                                </div>

                                <!-- Button Title 2 -->
                                <div class="mb-4 mt-3">
                                    <label for="read_more_two">Button Title 2</label>
                                    <input name="read_more_two" type="text" value="{{ $service->read_more_two ?? '' }}"
                                           class="form-control" id="read_more_two" placeholder="Enter read more two">
                                           <span class="read_more_two-validation error-validation" style="color:red;"></span>
                                </div>

                                <!-- Link -->
                                <div class="mb-4 mt-3">
                                    <label for="link">Link</label>
                                    <input name="link" type="text" value="{{ $service->link ?? '' }}"
                                           class="form-control" id="link" placeholder="Enter link">
                                           <span class="link-validation error-validation" style="color:red;"></span>
                                </div>

                                <!-- Link 2 -->
                                <div class="mb-4 mt-3">
                                    <label for="link_two">Link 2</label>
                                    <input name="link_two" type="text" value="{{ $service->link_two ?? '' }}"
                                           class="form-control" id="link_two" placeholder="Enter link two">
                                           <span class="link_two-validation error-validation" style="color:red;"></span>
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