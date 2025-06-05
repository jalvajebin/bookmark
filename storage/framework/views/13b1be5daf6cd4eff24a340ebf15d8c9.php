<div id="tab2" class="tab-content"> <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>Post Vacancy Applications</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Post Vacancy Applications</li>
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
                        <h5 class="card-title">Post Vacancy Applications List</h5>
                        
                        <div class="top-hd-box-right">
                            <a href="<?php echo e(route('applications-vacancy.export')); ?>" class="btn btn-primary">Export
                                All</a>
                            <a href="#" onclick="exportVacancySelect(event)" class="btn btn-primary">Select &
                                Export</a>
                            <a href="#" class="btn btn-danger" onclick="deleteVacancyApplication(event)">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 tbl-res">
                            <table id="postVacancyTable" class="table table-bordered mb-3 dt-responsive  nowrap w-100 ">
                                <thead>
                                    <tr>
                                        <th>SL.NO</th>
                                        <th>Company Name</th>
                                        <th>School Name</th>
                                        <th>Full Name</th>
                                        <th>Job Title</th>
                                        <th>Website Address</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                        <th>Curriculum</th>
                                        <th>No. of Vacancies</th>
                                        <th>Privacy Notice Accepted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/cv/post-vacancy-application.blade.php ENDPATH**/ ?>