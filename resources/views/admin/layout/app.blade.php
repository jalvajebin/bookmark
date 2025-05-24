<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Flyoverind" name="description" />
    <meta content="Flyoverind" name="author" />

    <link rel="shortcut icon" href="{{ asset('assets/images/flat-fav.png') }}">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/mainstyle.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!--loader CSS -->
    <link rel="stylesheet" href="{{ asset('admin/loader/cover-spin.css') }}">
    <!--data table CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <!--alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- -------------------------------cs date time picker-------------------------------------->
    <link href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-timepicker.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
        rel="stylesheet">

    @yield('css')
    <style>
        .navbar-brand-box {
            background-color: #fff !important;
        }

        .cke_notifications_area {
            display: none !important;
        }

        .dataTables_empty {
            text-align: center;
        }

        .d-none {
            display: none !important;
        }

        .select2-container {
            width: 100% !important;
            border-color: #ced4da !important;

        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .table> :not(:first-child) {
            border-top: 0 solid !important;
            border-color: inherit !important;
        }

        div.dt-container .dt-length label {
            font-weight: 600 !important;
            margin-left: 5px;
        }

        table.dataTable>thead>tr>th {
            border-bottom: none !important;
        }

        div.dt-container.dt-empty-footer tbody>tr:last-child>* {
            border-bottom: none !important;
        }

        div.dt-container .dt-paging .dt-paging-button.disabled {
            cursor: default;
            color: #000 !important;
            border: 1px solid #aeaeaed6;
            background: white;
            box-shadow: none;
        }

        div.dt-container .dt-paging .dt-paging-button.disabled:hover {
            color: #556ee6 !important;
            border: #556ee6 solid 1px !important;
            background: #fff !important;
        }

        div.dt-container .dt-paging .dt-paging-button.current {
            color: #fff !important;
            border: #556ee6 solid 1px !important;
            background: #556ee6 !important;
        }

        div.dt-container .dt-paging .dt-paging-button.current:hover {
            color: #556ee6 !important;
            background: #fff !important;
        }

        div.dt-container .dt-paging .dt-paging-button {
            cursor: default;
            color: #000 !important;
            border: 1px solid #aeaeaed6;
            background: white;
            box-shadow: none;
        }

        div.dt-container .dt-paging .dt-paging-button:hover {
            color: #556ee6 !important;
            border: #556ee6 solid 1px !important;
            background: #fff !important;
        }

        div.dt-container .dt-paging {
            color: inherit;
            display: flex;
            justify-content: end;
        }

        .table-responsive {
            overflow-x: hidden !important;
        }

        .switch.btn.btn-primary {
            width: 65.4688px !important;
        }

        .select2-container .select2-selection--single {
            height: 37px !important;
        }

        .select2-container .select2-selection--multiple {
            min-height: 37px !important;
        }

        .costum-pagination .pagination {
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }

        .costum-pagination .pagination .page-link {
            border-radius: 30px !important;
            margin: 0 3px !important;
            border: none;
            width: 32px;
            height: 32px;
            padding: 0;
            text-align: center;
            line-height: 32px;
        }

        
    </style>
</head>

<body data-sidebar="dark" data-layout-mode="light">
    <div id="loader"></div>
    <div id="layout-wrapper">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')
        <div class="main-content">
            @yield('content')
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            {{ date('Y') }} © Bookmark .
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Bookmark .
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="rightbar-overlay"></div>

    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script>
        var base_url = '{!! url('/') !!}/';
    </script>
    <!-- ........standard ck editor......... -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <!--data table JavaScript -->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <!--alertify JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ----------------------------js-date time------------------------------------------------- -->
    <script src="{{ asset('admin//assets/js/moment.js') }}"></script>
    <script src="{{ asset('admin//assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('admin//assets/js/bootstrap-timepicker.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
    </script>

    {{-- <script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places" type="text/javascript"></script> --}}
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    @yield('js')
    <script>
        $(".select2").select2();

        function alertMessage(message, type) {
            Swal.fire(
                '',
                message,
                type
            );
        }

        $(".numberValidation").on('keypress keyup input touchstart touchend', function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                e.preventDefault();
            }
        });
    </script>
    <script>
        function alertMessage(success, message, timer = 3000) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: timer,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: success,
                title: message
            });
        }
    </script>
    <script>
        $('#seoFormSubmit').submit(function(e) {
            e.preventDefault();
            $("#loader").show();
            $('#seoFormSubmit').data('content', 'seo/');
            var dataContent = $(this).data('content');
            var formData = new FormData(this);
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: base_url + dataContent + id,
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
                }
            });
        });
    </script>
</body>
</html>
