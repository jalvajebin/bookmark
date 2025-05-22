<div id="tab4" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>Meet Our Team</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Meet Our Team</li>
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
                    <div class="row">
                        <div class="col-sm-12 tbl-res">
                            <div class="top-hd-box mb-3">
                                <h5 class="card-title">Meet Our Team List</h5>
                                <div class="top-hd-box-right">
                                    <a href="#" class="btn btn-success add-cntry create-modal"
                                        onclick="teamAddForm(1)">Create New</a>
                                </div>
                            </div>
                            <table id="teamTable" class="table table-bordered mb-3 dt-responsive  nowrap w-100 ">
                                <thead>
                                    <tr>
                                        <th scope="col" width="10px" style="text-align: left; ">No</th>
                                        <th scope="col">Name</th>
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
<div class="modal fade bs-example-modal-xl" id="teamModal" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h5 class="modal-title heading" id="myExtraLargeModalLabel">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="teamForm" data-content=" " id="teamForm">
                @csrf
                <input type="hidden" class="team_id" name="team_id" id="team_id">
                <div class="modal-body p-4">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control name"
                                    placeholder="name">
                                <span class="name_validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control description" placeholder="description"></textarea>
                                <span class="description_validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="facebook">Facebook</label>
                                <input id="facebook" name="facebook" type="text" class="form-control facebook"
                                    placeholder="Facebook">
                                <span class="facebook_validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="instgaram">Instagram</label>
                                <input id="instagram" name="instagram" type="text" class="form-control instagram"
                                    placeholder="Instagram">
                                <span class="instagram_validation error-validation" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="linkedin">Linkedin</label>
                                <input id="linkedin" name="linkedin" type="text" class="form-control linkedin"
                                    placeholder="Linkedin">
                                <span class="linkedin_validation error-validation" style="color:red;"></span>
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
                                        src=""
                                        class="logo-image avatar-md img-thumbnail ImagePreview" id="ImagePreview"
                                        style="object-fit: contain;">
                                    <div class="edit-icon" onclick="ImageInputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="team_image" name="team_image" class="file-input image" accept="image/*"
                                    onchange="PreviewImage1(event)">
                                <span class="image_validation error-validation" style="color:red;"></span>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                            <div class="modal-footer p-4">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                    onclick="addTeam(event)">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
