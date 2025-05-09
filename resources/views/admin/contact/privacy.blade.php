<div id="tab5" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Privacy Policy</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Privacy Policy</li>
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
                    <form id="contactPrivacyForm">
                        @csrf
                        <input type="hidden" name="privacy_id" id="privacy_id" value="{{ $policy->id ?? '' }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Privacy Policy<span
                                            style="color:#ff0000">*</span></label>
                                    <textarea name="privacy" id="privacy" placeholder="Enter privacy policy" class="form-control privacy"
                                        cols="30" rows="2">{{ $policy->privacy }}</textarea>
                                    <span class="privacy_validation error-validation"
                                        style="color: red;"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Terms and Condition<span
                                            style="color:#ff0000">*</span></label>
                                    <textarea name="terms" id="terms" placeholder="Enter terms condition" class="form-control terms"
                                        cols="30" rows="2">{{ $policy->terms }}</textarea>
                                    <span class="terms_validation error-validation"
                                        style="color: red;"></span>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                onclick="addPolicy(event)">{{ isset($banner) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
