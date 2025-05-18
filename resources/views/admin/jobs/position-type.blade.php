<div id="tab5" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>Jobs</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Position</li>
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
                                <h5 class="card-title">Position List</h5>
                                <div class="top-hd-box-right">
                                    <a href="#" class="btn btn-success add-cntry create-modal" onclick="positionTypeAddForm(1)">Create New</a>
{{--                                    <a href="{{ route('jobs.create') }}" class="btn btn-success add-job-btn" >Create New</a>--}}
                                </div>
                            </div>
                            <table id="positionTypeTable" class="table table-bordered mb-3 dt-responsive  nowrap w-100 ">
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
<div class="modal fade bs-example-modal-xl" id="positionTypeModal" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h5 class="modal-title heading" id="myExtraLargeModalLabel">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="positionTypeForm" data-content=" " id="positionTypeForm">
                @csrf
                <input type="hidden" class="position_type_id" name="position_type_id" id="position_type_id">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input id="title" name="title" type="text"
                                       class="form-control title" placeholder="Title">
                                <span class="title_validation error-validation"
                                      style="color:red;"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer p-4">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="addPositionType(event)" >Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

