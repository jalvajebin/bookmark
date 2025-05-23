
<div id="tab1" class="tab-content">        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4>CV Applications</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">CV Applications</li>
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
                            <h5 class="card-title" >CV Applications List</h5>
                            {{-- <button onclick="jalu(event)">ddf</button> --}}
                            <div class="top-hd-box-right">
                                <a href="{{ route('contacts.export') }}" class="btn btn-primary">Export
                                    All</a>
                                <a href="#" onclick="exportSelect(event)" class="btn btn-primary">Select &
                                    Export</a>
                                <a href="#" class="btn btn-danger" onclick="deleteContactEnquiry(event)">Delete</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 tbl-res">
                                <table id="cvTable" class="table table-bordered mb-3 dt-responsive  nowrap w-100 ">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th> Name</th>
                                            <th> Phone </th>
                                            <th>Email</th>
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
