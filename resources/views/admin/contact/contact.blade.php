<div id="tab2" class="tab-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Contact Details</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Contact Details</li>
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
                    <form id="contactForm">
                        @csrf
                        <input type="hidden" name="contact_id" id="contact_id" value="{{ $contact->id ?? '' }}">
                        <div class="row">
                           
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        value="{{ $contact->title ?? '' }}" class="form-control title"
                                        placeholder="Enter title">
                                    <span class="title_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" name="phone" id="phone"
                                        value="{{ $contact->phone ?? '' }}" class="form-control phone"
                                        placeholder="Enter phone number">
                                    <span class="phone_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $contact->email ?? '' }}" placeholder="Enter email address">
                                    <span class="email_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="discription">Discription</label>
                                    <textarea id="discription" name="discription" class="form-control" placeholder="Enter discription">{{ $contact->discription ?? '' }}</textarea>
                                    <span class="discription_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="hours">Assist Hours</label>
                                    <textarea id="hours" name="hours" class="form-control" placeholder="Enter assist hours">{{ $contact->hours ?? '' }}</textarea>
                                    <span class="hours_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-12">
                                <div class="mb-4">
                                    <label for="copyright">Copyright</label>
                                    <input type="copyright" name="copyright" id="copyright" class="form-control"
                                        value="{{ $contact->copyright ?? '' }}" placeholder="Enter copyright">
                                    <span class="copyright_validation error-validation" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label">Logo<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is 2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <img alt="Logo"
                                        src="{{ $contact->logos->url ?? asset('admin/images/no-image.png') }}"
                                        class="logo-image avatar-md img-thumbnail image_class" id="logo1"
                                        style="object-fit: contain;">
                                    <div class="edit-icon" onclick="logo1InputTrigger()">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                            alt="Edit">
                                    </div>
                                </div>
                                <input type="file" id="logo1Input" name="logo" class="file-input"
                                    accept="image/*">
                                <span class="logo1_validation error-validation" style="color:red;"></span>
                            </div>
                            {{-- <div class="col-sm-6 col-md-6 col-6">
                                <label for="formFile" class="form-label">Brochure<span
                                        style="color:#ff0000">*</span></label>
                                <br>
                                <small class="text-red"> Maximum File Size Limit is
                                    2MB</small>
                                <div class="logo-wrapper mb-3">
                                    <div class="logo-image avatar-md img-thumbnail image_class"
                                        style="text-align: center;">
                                        <img alt="Logo" src="{{ asset('admin/images/pdf.png') }}" id="logo2"
                                            style="object-fit: cover;height:80%;">
                                        <h4 class="pdfFileName p-2">
                                            <a href="{{ $contact->brochures->url ?? '#' }}"
                                                target="{{ $contact->brochures->url ? '_blank' : '_self' }}"
                                                rel="noopener noreferrer">
                                                {{ $contact->brochures->url ? basename($contact->brochures->url) : 'No PDF Found' }}
                                            </a>
                                        </h4>
                                        <div class="edit-icon" onclick="logo1InputTrigger1()">
                                            <img src="https://img.icons8.com/material-outlined/24/000000/edit.png"
                                                alt="Edit">
                                        </div>
                                    </div>

                                </div>
                                <input type="file" id="logo2Input" name="brochure" class="file-input"
                                    accept="application/pdf">
                                <span class="logo2_validation error-validation" style="color:red;"></span>
                            </div> --}}

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="alt">Image Alt</label>
                                    <input id="logo_alt" name="alt" type="text" class="form-control"
                                        value="{{ $contact->alt ?? '' }}" placeholder="Enter alt">
                                </div>
                            </div>

                        </div>
                        <div class="d-flex flex-wrap left_side gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                onclick="addContact(event)">{{ isset($contact) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
