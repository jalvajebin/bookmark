@extends('admin.layout.app')
@section('title')
    {{ 'Profile | Veuz Gift' }}
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a>
                                </li>
                                <li class="breadcrumb-item active">Profile Details</li>
                            </ol>
                        </div>

                    </div><!--end row-->

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row center_flx">
            <div class="col-12 ">

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-user"></i></span>
                                        <span class="d-none d-sm-block">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-lock"></i></span>
                                        <span class="d-none d-sm-block">Change Password</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- ==========================profile==================================== -->
                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <div class="text-center">
                                        <div class="container">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label><i class="mdi mdi-pencil"></i></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview"
                                                        style="background-image: url('assets/images/users/avatar-1.jpg');">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="mt-0 mb-1">Name</h5>
                                        <p class="text-muted mb-0">Roll: Sales Manager</p>
                                        <div class="mt-4">
                                            <a href="" class="btn btn-soft-primary btn-hover w-100 rounded"><i
                                                    class="mdi mdi-image"></i> Update Profile</a>
                                        </div>

                                    </div>
                                </div>
                                <!-- ==========================change password==================================== -->
                                <div class="tab-pane" id="profile1" role="tabpanel">
                                    <div class="row center_flx">
                                        <div class="col-12">
                                            <div class="card overflow-hidden">
                                                <div class="card-body pt-5">

                                                    <div class="alert alert-success text-center mb-4 error-message"
                                                        role="alert">
                                                        <span>You can change your password </span>
                                                    </div>

                                                    <div class="">
                                                        <form class="form-horizontal" id="changePasswordForm" method="POST"
                                                            action="change-password">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">Old
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="old_password" name="old_password"
                                                                    placeholder="New Password">
                                                                <span class='old_password-validation error-validation'
                                                                    style="color:red;"></span>
                                                                <span class='invalid' style="color:red;"></span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">New
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="new_password" name="new_password"
                                                                    placeholder="New Password">
                                                                <span class='new_password-validation error-validation'
                                                                    style="color:red;"></span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">Confirm Password
                                                                </label>
                                                                <input type="password" class="form-control"
                                                                    id="confirm_password" name="confirm_password"
                                                                    placeholder="Confirm Password ">
                                                                <span class='confirm_password-validation error-validation'
                                                                    style="color:red;"></span>
                                                            </div>

                                                            <div class="text-end">
                                                                <button
                                                                    class="btn btn-primary w-md waves-effect waves-light"
                                                                    type="submit">Reset</button>
                                                            </div>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div>
                                <!-- ============================================================== -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div><!--end col-->

    </div><!--end row-->

    </div> <!-- container-fluid -->
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('submit', '#changePasswordForm', function(e) {
                //    $(".changePasswordAdminForm").submit(function(e) {
                e.preventDefault();
                $("#loader").show();
                var formData = new FormData(this);
                var id = $(this).data('id');
                $('.old_password-validation').html('');
                $('.new_password-validation').html('');
                $('.confirm_password-validation').html('');
                $('.error-validation').html('');
                $('.invalid').html('');

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(result) {
                        $('#loader').hide();
                        var message = result.message;
                        if (result.status == true) {
                            Swal.fire(
                                '',
                                message,
                                'success'
                            );
                            $("#changePasswordForm")[0].reset();
                            $(".error-message span").html('Sucess..!');
                        } else if (result.status == false) {
                            Swal.fire(
                                '',
                                message,
                                'error'
                            );
                            $("#changePasswordForm")[0].reset();
                            $(".error-message span").html('Failed..!');
                        }
                    },
                    error: function(data) {
                        $('#loader').hide();
                        $("#loader").hide();
                        console.log(data.responseJSON.message);
                        $(".error-message span").html(data.responseJSON.message);
                        var old_password = data.responseJSON.errors.old_password;
                        var new_password = data.responseJSON.errors.new_password;
                        var confirm_password = data.responseJSON.errors.confirm_password;

                        $('.old_password-validation').html(old_password);
                        $('.new_password-validation').html(new_password);
                        $('.confirm_password-validation').html(confirm_password);
                        // $('.invalid').html(data.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
