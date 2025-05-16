<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Veuz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Fitsolution" name="description" />
    <meta content="Fitsolution" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/web/assets/img/fav.png') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Main Css-->
    <link href="{{ asset('admin/assets/css/mainstyle.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Loader -->
    <link href="{{ asset('admin/loader/cover-spin.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="loader"></div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg_blue">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary white_clor p-4">
                                        <h5 class="">Welcome Back !</h5>
                                        <p>Sign in to continue to Bookmark.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="admin/assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="#" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/fav-new.webp" alt="" class="rounded-circle"
                                                height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="#" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('admin/web/assets/img/fav.png') }}" alt="" class="rounded-circle"
                                                height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="post" id="formSubmit" data-content="login">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Enter username">
                                        <span class="username-validation error-validation" style="color:red;"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Enter password" aria-label="Password"
                                                aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <span class="password-validation error-validation" style="color:red;"></span>
                                    </div>
                                    <span class="invalid error-validation" style="color:red;"></span>
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="admin/assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="admin/assets/js/app.js"></script>

    <script>
        var base_url = '{!! url('/') !!}/';
    </script>


    <!--admin login -->
    <script type="text/javascript">
        $(document).ready(function(e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //modal validation reset
            $('.error-validation').html('');
            // modal form id  ,store
            $('#formSubmit').submit(function(e) {
                $('#loader').show();
                e.preventDefault();
                var formData = new FormData(this);
                //validation
                $('.username-validation').html('');
                $('.password-validation').html('');
                //invalid credential
                $('.invalid').html('');

                //store  
                $.ajax({
                    type: 'post',
                    url: base_url + 'login',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    //sweet alert
                    success: (data) => {
                        $('#loader').hide();
                        this.reset();
                        var url = data.redirect_location;
                        console.log(url);
                        window.location.href = url;
                    }, //end sweet alert// validation
                    error: function(data) {
                        //invalid cred
                        $('#loader').hide();
                        $('.invalid').html(data.responseJSON.message);
                        var username = data.responseJSON.errors.username;
                        var password = data.responseJSON.errors.password;

                        $('.username-validation').html(username);
                        $('.password-validation').html(password);
                        //ivalid cred
                        $('.invalid').html('');
                    } //end validation


                });
            });
        });
    </script>

</body>

</html>
