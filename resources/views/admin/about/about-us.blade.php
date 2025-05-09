<div id="tab4" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4>About Us</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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
                    <form class="aboutUsFormSubmit" id="aboutUsFormSubmit">
                        @csrf
                        {{-- <input type="hidden" class="about_us_id" name="about_us_id" id="about_us_id"
                            value="{{ $aboutUs->id ?? '' }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text" class="form-control title"
                                        placeholder="Title" value="{{ $aboutUs->title ?? '' }}">
                                    <span class="title-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="heading">Heading</label>
                                    <input id="heading" name="heading" type="text" class="form-control title"
                                        placeholder="Heading" value="{{ $aboutUs->heading ?? '' }}">
                                    <span class="heading-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="short_description">Short Description</label>
                                    <textarea id="short_description" name="short_description" rows="5" class="form-control short_description"
                                        placeholder="Enter Short Description">{{ $aboutUs->short_description ?? '' }}</textarea>
                                    <span class="short_description_validation error-validation"
                                        style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" rows="5" class="form-control description"
                                        placeholder="Enter Description">{{ $aboutUs->description ?? '' }}</textarea>
                                    <span class="description-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="count_1_name">Count 1 Name</label>
                                    <input id="count_1_name" name="count_1_name" type="text"
                                        class="form-control count_1_name" placeholder="Count 1 Name"
                                        value="{{ $aboutUs->count_1_name ?? '' }}">
                                    <span class="count_1_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="count1">Count 1</label>
                                    <input id="count1" name="count1" type="text" class="form-control count1"
                                        placeholder="Count 1" value="{{ $aboutUs->count1 ?? '' }}">
                                    <span class="count1-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="count_2_name">Count 2 Name</label>
                                    <input id="count_2_name" name="count_2_name" type="text"
                                        class="form-control count_2_name" placeholder="Count 2 Name"
                                        value="{{ $aboutUs->count_2_name ?? '' }}">
                                    <span class="count_2_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="count2">Count 2</label>
                                    <input id="count2" name="count2" type="text" class="form-control title"
                                        placeholder="Count 2" value="{{ $aboutUs->count2 ?? '' }}">
                                    <span class="count2-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="count_3_name">Count 3 Name</label>
                                    <input id="count_3_name" name="count_3_name" type="text"
                                        class="form-control count_3_name" placeholder="Count 3 Name"
                                        value="{{ $aboutUs->count_3_name ?? '' }}">
                                    <span class="count_3_name_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="count3">Count 3</label>
                                    <input id="count3" name="count3" type="text" class="form-control title"
                                        placeholder="Count 3" value="{{ $aboutUs->count_3 ?? '' }}">
                                    <span class="count3-validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
