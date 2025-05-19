  <div id="tab1" class="tab-content">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4>Service we provide</h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                          <li class="breadcrumb-item active">Service we provide</li>
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
                      <div class="top-hd-box mb-3">
                          <h5 class="card-title">Service we provide List</h5>
                          <div class="top-hd-box-right">
                              <a href="{{route('createServicProvide')}}" class="btn btn-success">Create
                                  New</a>
                          </div>
                      </div>
                      <table id="serviceWeProYajTable" class="table table-bordered mb-3 dt-responsive nowrap w-100">
                          <thead style="background-color:#d3dae4;">
                              <tr>
                                  <th>No</th>
                                  <th>Title</th>
                                  <th>Descriptin</th>
                                  <th>Action</th>
                              </tr> 
                          </thead>
                      </table>

                  </div>
              </div>

          </div>
      </div>
  </div>