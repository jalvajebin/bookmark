@extends('admin.layout.app')
@section('title')
    {{ ' What we do | Bookmark' }}
@endsection
@section('css')
    <style>
        .logo-container {
            text-align: center;
            margin-top: 20px;
        }

        .logo-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 150px;
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

        ul {
            list-style: none;
        }

        .tab-list {
            margin-left: 10px;
        }

        .tab-list.active {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list.active a {
            color: #14b0c4;
        }

        .tab-list a {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #0c6d78;
        }

        .tab-list:hover {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list a:hover {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #14b0c4;
        }

        ul {
            list-style: none;
        }

        .tab-list {
            margin-left: 10px;
        }

        .tab-list.active {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list.active a {
            color: #14b0c4;
        }

        .tab-list a {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #0c6d78;
        }

        .tab-list:hover {
            border-bottom: 2px solid #14b0c4;
            height: 36px;
        }

        .tab-list a:hover {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 26px !important;
            color: #14b0c4;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page list -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="d-flex align-items-center m-0 p-0" id="tabs-nav">
                               

                                 <li class="tab-list">
                                    <a href="#tab1" class="m-2">what we do </a>
                                </li>
                             
                             
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page list -->
            <div id="tabs-content">
             
              @include('admin.whatwedo.whatwedo') 

            
            </div>


    </div>
    <div tabindex="-1" class="modal pmd-modal fade come-from-modal right" id="deliveryModal" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h3 class="modal-title">Email Delivery Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="deliveryContent">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close <i
                            class="far fa-gem ml-1 white-text"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('admin.whatwedo.js.datatable')
    {{-- @include('admin.whatwedo.js.script') --}}
<!-- CSRF -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.delete-btn', function () {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/whyworkwith/why-work-with-delete/' + id,
                        type: 'DELETE',
                        success: function (res) {
                            Swal.fire({
                                icon: res.icon ?? 'success',
                                title: res.title ?? 'Deleted!',
                                text: res.message ?? 'Service has been deleted.'
                            });
                            $('#whyWorkWithProYajTable').DataTable().ajax.reload(); 
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong while deleting!'
                            });
                        }
                    });
                }
            });
        });
    });



  $('#tabs-nav li:first-child').addClass('active');
         $('.tab-content').hide();
         $('.tab-content:first').show();
         $('#tabs-nav li').click(function() {
             $('#tabs-nav li').removeClass('active');
             $(this).addClass('active');
             $('.tab-content').hide();
             var activeTab = $(this).find('a').attr('href');
             $(activeTab).fadeIn();
             return false;
         });

    </script>
@endsection






