<div id="tab5" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>Testimonials</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="top-hd-box mb-3">
                        <h5 class="card-title">Testimonial List</h5>
                        <div class="top-hd-box-right">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 tbl-res">
                            <div class="top-hd-box mb-3">
                                <h5 class="card-title">Banner List</h5>
                                <div class="top-hd-box-right">
                                    <a href="#" class="btn btn-success add-cntry create-modal" onclick="testimonialAddForm(1)">Create New</a>
                                </div>
                            </div>
                            <table id="testimonialTable" class="table table-bordered mb-3 dt-responsive  nowrap w-100 ">
                                <thead>
                                    <tr>
                                        <th scope="col" width="10px" style="text-align: left; ">No</th>
                                        <th scope="col">heading</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-xl" id="testimonialModal" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h5 class="modal-title heading" id="myExtraLargeModalLabel">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="testimonialForm" data-content=" " id="testimonialForm">
                    @csrf
                    <input type="hidden" class="testimonial_id" name="testimonial_id" id="testimonial_id">
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="date">Date<span style="color:#ff0000">*</span></label>
                                    <div class="input-group">
                                        <input id="date" name="date" autocomplete="off" type="text"
                                            class="form-control date" placeholder="DD-MM-YYYY">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="font-size: 20px;"><i
                                                    class='bx bxs-calendar'></i></span>
                                        </div>
                                    </div>
                                    <span class="date-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="heading">Heading</label>
                                    <input id="heading" name="heading" type="text"
                                        class="form-control heading" placeholder="Enter heading">
                                    <span class="heading_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <input id="description" name="description" type="text"
                                        class="form-control description" placeholder="Description">
                                    <span class="description_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label"> Image <span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is 2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <img alt="Image"
                                        src="{{ $learnAboutUs->images->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail ImagePreview" id="ImagePreview"
                                        style="object-fit: contain;">
                                    <div class="edit-icon" onclick="ImageInputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="image" name="image" class="file-input image" accept="image/*"
                                    onchange="PreviewImage1(event)">
                                <span class="image_validation error-validation" style="color:red;"></span>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="alt"> Image Alt</label>
                                    <input id="alt" name="alt" type="text" class="form-control alt"
                                        value="{{ $learnAboutUs->alt ?? '' }}" placeholder="Enter alt">
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer p-4">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="addTestimonial(event)">Save</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
