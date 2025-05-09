<div id="tab4" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Social Media Links</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Social Media Links</li>
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
                    <form id="socialForm">
                        @csrf
                        <input type="hidden" name="social_id" id="social_id" value="{{ $social->id ?? '' }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram" id="instagram"
                                        value="{{ $social->instagram ?? '' }}" class="form-control"
                                        placeholder="Enter instagram link">
                                    <span class="instagram_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" id="facebook"
                                        value="{{ $social->facebook ?? '' }}" class="form-control"
                                        placeholder="Enter facebook link">
                                    <span class="facebook_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="twitter">Twiitter</label>
                                    <input type="text" name="twitter" id="twitter"
                                        value="{{ $social->twitter ?? '' }}" class="form-control"
                                        placeholder="Enter twitter link">
                                    <span class="twitter_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" name="linkedin" id="linkedin"
                                        value="{{ $social->linkedin ?? '' }}" class="form-control"
                                        placeholder="Enter linkedin link">
                                    <span class="linkedin_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>


                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                onclick="addSocial(event)">{{ isset($social) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
