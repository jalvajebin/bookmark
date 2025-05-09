<div id="tab1" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>Branches </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Branches </li>
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
                        <h5 class="card-title">Branches List</h5>
                        <div class="top-hd-box-right">
                            <a href="javascript:void(0);" class="btn btn-success add-cntry" onclick="addBranchForm(1)">Add
                                Branch</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 tbl-res" id="table-pagination">
                            <table id="branchTable" class="table table-bordered mb-3 dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th scope="col" width="10px" style="text-align: left; ">No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Status </th>
                                        <th scope="col">Action </th>
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
<!-- Modal -->
<div class="modal fade bs-example-modal-xl" id="branchModal" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title branch_heading" id="myExtraLargeModalLabel">Add Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="branchForm">
                    @csrf
                    <input type="hidden" class="id" name="id" id="id">

                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="name">Name<span style="color:#ff0000">*</span></label>
                                <input id="name" name="name" type="text" class="form-control name" placeholder="Name">
                                <span class="name_validation error-validation" style="color: red;"></span>
                            </div>
                            <div class="col-md-6 mb-3">
                               <label for="location">Location<span style="color:#ff0000">*</span></label>
                                <input id="location" name="location" type="text" class="form-control location" placeholder="Location">
                                <span class="location_validation error-validation" style="color: red;"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone Number<span style="color:#ff0000">*</span></label>
                                <input id="phone" name="phone" type="text" class="form-control phone" placeholder="Phone Number">
                                <span class="phone_validation error-validation" style="color: red;"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                               <label for="email">E-Mail<span style="color:#ff0000">*</span></label>
                                <input id="email" name="email" type="text" class="form-control email" placeholder="E-Mail">
                                <span class="email_validation error-validation" style="color: red;"></span>
                            </div>

                            <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label">Logo<span style="color:#ff0000">*</span></label>
                                <div class="logo-wrapper mb-3">
                                    <img alt="Logo"
                                        src="{{ asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class" id="branchImage"
                                        style="object-fit: contain;">
                                    <div class="edit-icon" onclick="branchInputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="branchInput" name="branch" class="file-input"
                                    accept="image/*">
                                <span class="branch_validation error-validation" style="color:red;"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" class="form-control address" placeholder="Enter Address"></textarea>
                                <span class="address_validation error-validation" style="color:red;"></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="maplink">Maplink</label>
                                <textarea id="maplink" name="maplink" class="form-control maplink" placeholder="Enter Maplink"></textarea>
                                <span class="maplink_validation error-validation" style="color:red;"></span>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"
                            onclick="cancel()">Close</button>
                        <button type="submit" id="accoButton" class="btn btn-primary waves-effect waves-light"
                            onclick="addBranch(event)">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
