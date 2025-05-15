<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>Jobs</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Destination</li>
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
                                <h5 class="card-title">Destination List</h5>
                                <div class="top-hd-box-right">
                                    <a href="/admin/destination/create" class="btn btn-success add-cntry create-modal" onclick="testimonialAddForm(1)">Create New</a>
                                </div>
                            </div>
                            <table id="destinationTable" class="table table-bordered mb-3 dt-responsive  nowrap w-100 ">
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
