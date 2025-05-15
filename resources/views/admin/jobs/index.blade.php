@extends('admin.layout.app')
@section('title')
    {{ 'Job | Veuz' }}
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        td a {
            color: #495057;
        }

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
                                    <a href="#tab2" class="m-2">Job</a>
                                </li>
                               
                                {{-- <li class="tab-list">
                                    <a href="#tab4" class="m-2">Seo</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page list -->
            <div id="tabs-content">
                <div id="tab1" class="tab-content">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4>Job</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item active">job</li>
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
                                        <h5 class="card-title">Job List</h5>
                                        <div class="top-hd-box-right">
                                            <a href="{{ route('jobs.create') }}" class="btn btn-success">Create
                                                New</a>
                                        </div>
                                    </div>
                                    <table id="myTable-blog" class="table table-bordered mb-3 dt-responsive  nowrap w-100">
                                        <thead style="background-color:#d3dae4;">
                                            <tr>
                                                <th scope="col" width="10px"
                                                    style="text-align: left; background-color:#d3dae4;">No</th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Title
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Main
                                                    Image
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">Inner
                                                    Image
                                                </th>
                                                <th scope="col" width="10px" style="background-color:#d3dae4;">
                                                    Status
                                                </th>
                                                <th scope="col" width="20px" style="background-color:#d3dae4;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="blog-result">
                                            {{-- @include('admin.blog.blogResult') --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
  
@endsection
@section('js')
    @include('admin.blog.js.datatable')
   
@endsection
