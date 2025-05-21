@extends('admin.layout.app')
@section('title')
{{ 'Profile | Bokkmark' }}
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .logo-wrapper {
            position: relative;
            display: inline-block;
            width: 120px !important;
            height: 120px !important;
        }

        .logo-image {
            width: 100%;
            height: 100%;
            border: 2px solid #ccc;
            border-radius: 10px;
            object-fit: cover;
        }

        .edit-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: white;
            border: 1px solid #b1b1b1;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }

        .edit-icon img {
            width: 16px;
            height: 16px;
        }

        .file-input {
            display: none;
        }
    </style>
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
                        <h4>Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div><!--end row-->

                </div>
            </div>
            <div class="row pro-page">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-user"></i></span>
                                        <span class="d-sm-block">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item" id="passwordTab">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-lock"></i></span>
                                        <span class="d-sm-block">Change Password</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <div class="text-center">
                                        <form id="profileUpdateForm" data-content="profile-update">
                                            @csrf
                                            {{-- <div class="container">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' name="image" id="imageUpload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"> <i class="mdi mdi-pencil"></i></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview"
                                                            style="background-image: url('{{ userImage() }}')">
                                                        </div>
                                                    </div>
                                                    <span class='image-validation' style="color:red;"></span>
                                                </div>
                                            </div> --}}

                                            <div class="col-12">
                                                <div class="logo-wrapper mb-3">
                                                    <img src="{{ asset('assets/img/user.jpg') }}"
                                                        alt="Logo"
                                                        class="logo-image avatar-md rounded-circle img-thumbnail image_class"
                                                        id="logoPreview" style="object-fit: contain;background: #97959580;">
                                                    <div class="edit-icon" onclick="triggerLogoFileInput()">
                                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                                            alt="Edit">
                                                    </div>
                                                </div>
                                                <input type="file" id="logo-input" name="image" class="file-input" accept=".png, .jpg, .jpeg" onchange="previewLogo(event)">
                                            </div>

                                            <h5 class="mt-0 mb-1">{{ $user->name ?? '' }}</h5>

                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-soft-primary btn-hover w-100 rounded">
                                                    <i class="mdi mdi-image"></i> Update Profile
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile1" role="tabpanel">
                                    <div class="row center_flx">
                                        <div class="col-12">
                                            <div class="card overflow-hidden">
                                                <div class="card-body pt-3">

                                                    <div class="alert alert-success text-center mb-4" role="alert">
                                                        <span>You can change your password </span>
                                                    </div>

                                                    <div class="">
                                                        <form class="form-horizontal" id="changePasswordForm" method="POST"
                                                            action="change-password">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">Old
                                                                    Password</label>
                                                                <div class="input-group auth-pass-inputgroup">
                                                                    <input type="password" class="form-control"
                                                                        name="old_password" placeholder="Enter password"
                                                                        aria-label="Password" aria-describedby="password-addon">
                                                                    <button class="btn btn-light" type="button"
                                                                        id="password-addon"><i
                                                                            class="mdi mdi-eye-outline"></i></button>
                                                                </div>
                                                                <span class='old_password-validation error-validation'
                                                                    style="color:red;"></span>

                                                                <span class='invalid' style="color:red;"></span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">New
                                                                    Password</label>

                                                                <div class="input-group auth-pass-inputgroup">
                                                                    <input type="password" class="form-control"
                                                                        name="new_password" placeholder="Enter password"
                                                                        aria-label="New Password"
                                                                        aria-describedby="new_password">
                                                                    <button class="btn btn-light" type="button"
                                                                        id="new_password"><i
                                                                            class="mdi mdi-eye-outline"></i></button>
                                                                </div>
                                                                <span class='new_password-validation error-validation'
                                                                    style="color:red;"></span>
                                                                {{-- <input type="password" class="form-control" id="new_password"
                                                                        name="new_password" placeholder="New Password">
                                                                    --}}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="useremail" class="form-label">Confirm Password
                                                                </label>

                                                                <div class="input-group auth-pass-inputgroup">
                                                                    <input type="password" class="form-control"
                                                                        name="confirm_password"
                                                                        placeholder="Enter Confirm Password"
                                                                        aria-label="New Password"
                                                                        aria-describedby="confirm_password">
                                                                    <button class="btn btn-light " type="button"
                                                                        id="confirm_password"><i
                                                                            class="mdi mdi-eye-outline"></i></button>
                                                                </div>

                                                                {{-- <input type="password" class="form-control"
                                                                        id="confirm_password" name="confirm_password"
                                                                        placeholder="Confirm Password "> --}}
                                                                <span class='confirm_password-validation error-validation'
                                                                    style="color:red;"></span>
                                                            </div>

                                                            <div class="text-end">
                                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                                    type="submit">Reset</button>
                                                            </div>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card pro-details">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 persnl-info-div">
                                    <h4 class="card-title">Personal Information</h4>


                                    <div class="table-responsive">
                                        <form id="profileSubmit" class="profileSubmit">
                                            @csrf
                                            <table class="table table-nowrap mb-0">
                                                <input type="hidden" name="id" id="id"
                                                    data-id="{{ $user->id ?? '' }}" class="form-control"
                                                    value="{{ $user->id ?? '' }}">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>
                                                            <div class="inpt-txt"><input type="text" name="name"
                                                                    id="name" class="form-control"
                                                                    value="{{ $user->name ?? '' }}">
                                                                <span class="name-validation error-validation"
                                                                    style="color: red;"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>
                                                            <div class="inpt-txt"><input type="text" name="email"
                                                                    id="email" class="form-control"
                                                                    value="{{ $user->email ?? '' }}"> <span
                                                                    class="email-validation error-validation"
                                                                    style="color: red;"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-x" style="margin-top: 45px;">Update</button>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <!--end col-->
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function triggerLogoFileInput() {
            document.getElementById('logo-input').click();
        }
        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('logoPreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
    <script>
        $('#passwordTab').on('click', function() {
            $('.error-validation').html('');

        })
    </script>
    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('submit', '#changePasswordForm', function(e) {

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
    <script>
        $(document).on('submit', '#profileUpdateForm', function(e) {
            e.preventDefault();
            $("#loader").show();
            $('.error-validation').html('');
            var formData = new FormData(this);
            var id = $(this).data('id');
            var dataContent = $(this).data('content');
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.profile.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#loader").hide();
                    var message = data.message;
                    if (data.status == true) {
                        Swal.fire(
                            '',
                            message,
                            'success'
                        );
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else if (data.status == false) {
                        Swal.fire(
                            '',
                            message,
                            'error'
                        );

                    }
                },
                error: function(data) {
                    $("#loader").hide();
                    console.log(data.responseJSON.errors);
                    var image = data.responseJSON.errors.image;
                    $('.image-validation').html(image);

                }
            });
        });

        $(document).on('submit', '#profileSubmit', function(e) {
            e.preventDefault();
            $("#loader").show();
            $('.error-validation').html('');
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.profiledata.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#loader").hide();
                    var message = data.message;
                    if (data.status == true) {
                        Swal.fire(
                            '',
                            message,
                            'success'
                        );
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else if (data.status == false) {
                        Swal.fire(
                            '',
                            message,
                            'error'
                        );

                    }
                },
                error: function(data) {
                    $("#loader").hide();
                    console.log(data.responseJSON.errors);
                    var image = data.responseJSON.errors.image;
                    $('.image-validation').html(image);

                    var name = data.responseJSON.errors.name;
                    var phone = data.responseJSON.errors.phone;
                    var email = data.responseJSON.errors.email;
                    var country = data.responseJSON.errors.country;
                    $('.name-validation').html(name);
                    $('.phone-validation').html(phone);
                    $('.email-validation').html(email);
                    $('.country-validation').html(country);

                }
            });
        });
    </script>
@endsection
