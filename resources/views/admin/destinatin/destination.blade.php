<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Destination</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('services.index') }}">Destination</a>
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
                    <form class="destinationFormSubmit" id="destinationFormSubmit">
                        @csrf
                        <input type="hidden" class="destination_id" name="destination_id" id="destination_id"
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

                         


                            <div class="col-sm-6 col-6">
                                <div class="mb-3">
                                    <label for="description_one">Description one</label>
                                    <input id="description_one" name="description_one" type="text"
                                           class="form-control description_one" placeholder="description one"
                                           value="{{ $service->title_two ?? '' }}">
                                    <span class="description_one-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>



                            <div class="col-sm-6 col-6">
                                <div class="mb-3">
                                    <label for="description_two">Description two</label>
                                    <input id="description_two" name="description_two" type="text"
                                           class="form-control description_two" placeholder="description two"
                                           value="{{ $service->title_two ?? '' }}">
                                    <span class="description_two-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>




                            <!-- Image 1 -->
                            <div class="col-sm-6 col-6">
                                <label for="destination_image" class="form-label">Image 1 <span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="destinationPreview1" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('destination_image').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="destination_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="destination_image" name="destination_image" class="file-input d-none"
                                       accept="image/*" onchange="previewDestinationImage(event, 'destinationPreview1')">

                                       <div class="mb-4 mt-3">
                                        <label for="name">Image Alt one</label>
                                        <input name="alt_one" type="text" value="{{ $banner->alt ?? '' }}"
                                            class="form-control" id="alt_one" placeholder="Enter Alt">
    
                                    </div>
                            </div>

                            <!-- Image 2 -->
                            <div class="col-sm-6 col-6">
                                <label for="destination_image_two" class="form-label">Image 2 <span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="destinationPreview2" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('destination_image_two').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="destination_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="destination_image_two" name="destination_image_two" class="file-input d-none"
                                       accept="image/*" onchange="previewDestinationImage(event, 'destinationPreview2')">

                                       <div class="mb-4 mt-3">
                                        <label for="name">Image Alt two</label>
                                        <input name="alt_two" type="text" value="{{ $banner->alt ?? '' }}"
                                            class="form-control" id="alt_two" placeholder="Enter Alt">
    
                                    </div>
                              
                            </div>

                            <div class="col-sm-6 col-6">
                                <label for="destination_image_three" class="form-label">Image 3 <span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="destinationPreview3" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('destination_image_three').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="destination_image_three-validation error-validation" style="color:red;"></span>
                                <input type="file" id="destination_image_three" name="destination_image_three" class="file-input d-none"
                                       accept="image/*" onchange="previewDestinationImage(event, 'destinationPreview3')">

                                       <div class="mb-4 mt-3">
                                        <label for="name">Image Alt three</label>
                                        <input name="alt_three" type="text" value="{{ $banner->alt ?? '' }}"
                                            class="form-control" id="alt_three" placeholder="Enter Alt">
    
                                    </div>
                              
                            </div>

                            <div class="col-sm-6 col-6">
                                <label for="destination_image_four" class="form-label">Image 4 <span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="destinationPreview4" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('destination_image_four').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="destination_image_four-validation error-validation" style="color:red;"></span>
                                <input type="file" id="destination_image_four" name="destination_image_four" class="file-input d-none"
                                       accept="image/*" onchange="previewDestinationImage(event, 'destinationPreview4')">

                                       <div class="mb-4 mt-3">
                                        <label for="name">Image Alt four</label>
                                        <input name="alt_four" type="text" value="{{ $banner->alt ?? '' }}"
                                            class="form-control" id="alt_four" placeholder="Enter Alt">
    
                                    </div>
                              
                            </div>

                            <div class="col-sm-6 col-6">
                                <label for="destination_image_five" class="form-label">Image 5 <span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="destinationPreview5" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('destination_image_five').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="destination_image_five-validation error-validation" style="color:red;"></span>
                                <input type="file" id="destination_image_five" name="destination_image_five" class="file-input d-none"
                                       accept="image/*" onchange="previewDestinationImage(event, 'destinationPreview5')">

                                       <div class="mb-4 mt-3">
                                        <label for="name">Image Alt five</label>
                                        <input name="alt_five" type="text" value="{{ $banner->alt ?? '' }}"
                                            class="form-control" id="alt_five" placeholder="Enter Alt">
    
                                    </div>
                              
                            </div>

                            <div class="col-sm-6 col-6">
                                <label for="destination_image_six" class="form-label">Image 6<span style="color:#ff0000">*</span></label><br>
                                <div class="logo-wrapper">
                                    <img alt="Logo"
                                         src="{{ $service->images->preview ?? asset('admin/images/no-image.png') }}"
                                         class="logo-image avatar-md img-thumbnail image_class"
                                         id="destinationPreview6" style="object-fit: contain;">
                                    <div class="edit-icon" onclick="document.getElementById('destination_image_six').click()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png" alt="Edit">
                                    </div>
                                </div>
                                <span class="destination_image-validation error-validation" style="color:red;"></span>
                                <input type="file" id="destination_image_six" name="destination_image_six" class="file-input d-none"
                                       accept="image/*" onchange="previewDestinationImage(event, 'destinationPreview6')">

                                       <div class="mb-4 mt-3">
                                        <label for="name">Image Alt six</label>
                                        <input name="alt_six" type="text" value="{{ $banner->alt ?? '' }}"
                                            class="form-control" id="alt_six" placeholder="Enter Alt">
    
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