<div id="tab3" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Mission & Vision</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Mission & Vision</li>
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
                    <form class="missionVisionFormSubmit" id="missionVisionFormSubmit">
                        @csrf
                        <input type="hidden" class="mission_vision_id" name="mission_vision_id" id="mission_vision_id"
                            value="{{ optional($missionVision)->id ?? '' }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="mission_title">Mission Title</label>
                                    <input id="mission_title" name="mission_title" type="text"
                                        class="form-control mission_title" placeholder="Mission Title"
                                        value="{{ optional($missionVision)->mission_title ?? '' }}">
                                    <span class="mission_title_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="vision_title">Vision Title</label>
                                    <input id="vision_title" name="vision_title" type="text"
                                        class="form-control vision_title" placeholder="Vission Title"
                                        value="{{ optional($missionVision)->vision_title ?? '' }}">
                                    <span class="vision_title_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="mission_description">Mission Description</label>
                                    <textarea id="mission_description" name="mission_description" rows="5" class="form-control mission_description"
                                        placeholder="Enter Description">{{ optional($missionVision)->mission_description ?? '' }}</textarea>
                                    <span class="mission_description_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="vision_description">Vision Description</label>
                                    <textarea id="vision_description" name="vision_description" rows="5" class="form-control vision_description"
                                        placeholder="Enter Description">{{ optional($missionVision)->vision_description ?? '' }}</textarea>
                                    <span class="vision_description_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="formFile" class="form-label">Mission Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Mission Image"
                                        src="{{ optional($missionVision)->missionImage->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class logoPreview"
                                        id="missionImagePreview" style="background: #555555;object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerMisionFileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="mission_image" name="mission_image" class="file-input"
                                    accept="image/*" onchange="previewMision(event)">
                                <span class="mission_image_validation error-validation" style="color:red;"></span>

                                <div class="mb-4 mt-3">
                                    <label for="name">Mission Image Alt</label>
                                    <input name="mission_image_alt" type="text"
                                        value="{{ optional($missionVision)->missionImageAlt ?? '' }}" class="form-control"
                                        id="mission_image_alt" placeholder="Enter Alt">
                                    <span class="mission_image_alt-validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="formFile" class="form-label">Vision Image<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Vision Image"
                                        src="{{ optional($missionVision)->visionImage->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class logoPreview"
                                        id="visionImagePreview" style="background: #555555;object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerVisionFileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="vision_image" name="vision_image" class="file-input"
                                    accept="image/*" onchange="previewVision(event)">
                                <span class="vision_image_validation error-validation" style="color:red;"></span>
                                <div class="mb-4 mt-3">
                                    <label for="name">Vision Image Alt</label>
                                    <input name="vision_image_alt" type="text"
                                        value="{{ optional($missionVision)->visionImageAlt ?? '' }}" class="form-control"
                                        id="vision_image_alt" placeholder="Enter Alt">
                                    <span class="vision_image_alt_validation error-validation"
                                        style="color:red;"></span>
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
