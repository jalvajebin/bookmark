<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Why Choose US</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        {{-- <li class="breadcrumb-item"><a href="{{ route('service.index') }}">home</a> --}}
                        {{-- </li> --}}
                        <li class="breadcrumb-item active">Why Choose US</li>
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
                    <form class="whyCooseUsFormSubmit" id="whyCooseUsFormSubmit">
                        @csrf
                        <input type="hidden" class="id" name="id" id="id"
                            value="{{ $whyChooseUs->id ?? '' }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text" class="form-control title"
                                        placeholder="Title" value="{{ $whyChooseUs->title ?? '' }}">
                                    <span class="title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="heading">Heading</label>
                                    <input id="heading" name="heading" type="text" class="form-control title"
                                        placeholder="Heading" value="{{ $whyChooseUs->heading ?? '' }}">
                                    <span class="heading-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="formFile" class="form-label">Image 1<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Image1"
                                        src="{{ $whyChooseUs->image1->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class logoPreview"
                                        id="image1Preview" style="background: #555555;object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerImage1FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="image1_name" name="image1_name" class="file-input"
                                    accept="image/*" onchange="previewImage1(event)">
                                <span class="image1-validation error-validation" style="color:red;"></span>

                                <div class="mb-4 mt-3">
                                    <label for="name">Image 1 Alt</label>
                                    <input name="image1alt" type="text" value="{{ $whyChooseUs->image1alt ?? '' }}"
                                        class="form-control" id="alt" placeholder="Enter Alt">
                                    <span class="image1alt-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="formFile" class="form-label">Image 2<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <div class="logo-wrapper">
                                    <img alt="Image2"
                                        src="{{ $whyChooseUs->image2->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class logoPreview"
                                        id="image2Preview" style="background: #555555;object-fit: contain;">
                                    <div class="edit-icon" onclick="triggerImage2FileInput()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="image2_name" name="image2_name" class="file-input"
                                    accept="image/*" onchange="previewImage2(event)">
                                <span class="image2-validation error-validation" style="color:red;"></span>

                                <div class="mb-4 mt-3">
                                    <label for="name">Image 2 Alt</label>
                                    <input name="image2alt" type="text"
                                        value="{{ $whyChooseUs->image2alt ?? '' }}" class="form-control"
                                        id="image2alt" placeholder="Enter Alt">
                                    <span class="image2alt-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" rows="5" class="form-control description"
                                        placeholder="Enter Description">{{ $whyChooseUs->description ?? '' }}</textarea>
                                    <span class="description-validation error-validation" style="color:red;"></span>
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
