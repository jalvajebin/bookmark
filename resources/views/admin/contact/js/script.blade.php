<script>
    $(document).ready(function() {
        dataTable();
        dataTable1();
 
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
 
        let cropper;
        let uploadedImageURL;
 
 
        $('#upload-image').on('change', function(e) {
            const file = e.target.files[0];
 
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const uploadedImageURL = event.target.result;
                    $('#cropper-image').attr('src', uploadedImageURL);
 
                    $('#crop-modal').show();
 
                    if (cropper) {
                        cropper.destroy();
                    }
 
                    // Initialize Cropper
                    cropper = new Cropper($('#cropper-image')[0], { // jQuery [0] to DOM element
                        aspectRatio: 1, // Default square crop
                        viewMode: 1,
                        movable: true,
                        zoomable: true,
                        rotatable: true,
                        scalable: true
                    });
                };
                reader.readAsDataURL(file);
            }
        });
 
        // Button controls for cropping modes
        $('#square').on('click', function() {
            if (cropper) {
                cropper.setAspectRatio(1); // 1:1 square
                $('.cropper-crop-box, .cropper-view-box').css('border-radius', '0');
            }
        });
 
        $('#rectangle').on('click', function() {
            if (cropper) {
                cropper.setAspectRatio(16 / 9); // 16:9 rectangle
                $('.cropper-crop-box, .cropper-view-box').css('border-radius', '0');
            }
        });
 
        $('#circle').on('click', function() {
            if (cropper) {
                cropper.setAspectRatio(1); // 1:1 aspect, but show as circle
                $('.cropper-crop-box, .cropper-view-box').css('border-radius', '50%');
            }
        });
 
        $('#custom').on('click', function() {
            if (cropper) {
                cropper.setAspectRatio(NaN); // Free crop
                $('.cropper-crop-box, .cropper-view-box').css('border-radius', '0');
            }
        });
 
 
    });
 
 
    function triggerBanner1FileInput() {
        document.getElementById('banner1-input').click();
    }
 
    function previewBanner1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('bannerPreview1');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
 
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
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
    var noImage = 'admin/images/no-image.png';
 
    $('#bannerFormSubmit').submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var formData = new FormData(this);
        $('.error-validation').html('');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.banner.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#loader").hide();
                var message = data.message;
                if (data.status == true) {
                    alertMessage('success', message);
                } else if (data.status == false) {
                    alertMessage('error', message);
                }
            },
            error: function(data) {
                console.log(data);
                $("#loader").hide();
                var banner_title = data.responseJSON.errors.banner_title;
                var banner_image = data.responseJSON.errors.banner_image;
 
                $('.banner_title-validation').html(banner_title);
                $('.banner_image-validation').html(banner_image);
            }
        });
    });
 
    $('#contactFormSubmit').submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var dataContent = $(this).data('content');
        var formData = new FormData(this);
        $('.error-validation').html('');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.contact.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
 
            success: function(data) {
                $("#loader").hide();
                var message = data.message;
                if (data.status == true) {
                    alertMessage('success', message);
                } else if (data.status == false) {
                    alertMessage('error', message);
                }
            },
            error: function(data) {
                $("#loader").hide();
                var heading = data.responseJSON.errors.heading;
                var title = data.responseJSON.errors.title;
                var location = data.responseJSON.errors.location;
                var phone = data.responseJSON.errors.phone;
                var email = data.responseJSON.errors.email;
                var description = data.responseJSON.errors.description;
                var address = data.responseJSON.errors.address;
                var maplink = data.responseJSON.errors.maplink;
                var logoalt = data.responseJSON.errors.logoalt;
                var logoimage = data.responseJSON.errors.logo_image;
 
                $('.heading-validation').html(heading);
                $('.title-validation').html(title);
                $('.location-validation').html(location);
                $('.phone-validation').html(phone);
                $('.email-validation').html(email);
                $('.description-validation').html(description);
                $('.address-validation').html(address);
                $('.maplink-validation').html(maplink);
                $('.logoalt-validation').html(logoalt);
                $('.logoimage-validation').html(logoimage);
            }
        });
    });
 
    $('#socialFormSubmit').submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var dataContent = $(this).data('content');
        var formData = new FormData(this);
        $('.error-validation').html('');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.social.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
 
            success: function(data) {
                $("#loader").hide();
                var message = data.message;
                if (data.status == true) {
                    alertMessage('success', message);
                } else if (data.status == false) {
                    alertMessage('error', message);
                }
            },
            error: function(data) {
                $("#loader").hide();
                var facebook = data.responseJSON.errors.facebook;
                var titinstagramle = data.responseJSON.errors.instagram;
                var twitter = data.responseJSON.errors.twitter;
                var linkedin = data.responseJSON.errors.linkedin;
 
                $('.facebook-validation').html(facebook);
                $('.instagram-validation').html(instagram);
                $('.twitter-validation').html(twitter);
                $('.linkedin-validation').html(linkedin);
            }
        });
    });
 
    function checkEmail(message_id) {
        $("#loader").show();
        $.ajax({
            url: "/admin/get-delivery-status/" + message_id,
            type: 'get',
            beforeSend: function() {
                $("#loader").show();
            },
            complete: function() {
                $("#loader").hide();
            },
            success: function(response) {
                $("#deliveryContent").empty();
                $("#deliveryContent").html(response.view);
                $("#deliveryModal").modal('show');
                $("#loader").hide();
 
            },
            error: function(data) {
                console.log(data);
                $("#loader").hide();
            }
        });
    }
 
    function deleteContactEnquiry(e, id = '') {
        e.preventDefault();
        let ids = '';
        if (id == '') {
            ids = $("input:checkbox[class=contactIds]:checked").map(function() {
                return this.value;
            }).get();
 
            if (ids.length < 1) {
                alertMessage('warning', 'Please select row', );
                return;
            }
        } else {
            ids = [id];
        }
 
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let route = "{{ route('contact.enquiry.delete') }}"
                $.ajax({
                    type: 'POST',
                    url: route,
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: ids
                    },
                    dataType: "json",
 
                    beforeSend: function() {
                        $("#loader").show();
                    },
                    complete: function() {
                        $("#loader").hide();
                    },
                    success: function(data) {
                        $("#loader").hide();
                        if (data.success == true) {
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            )
                            $('#contactEnquiryTable').DataTable().ajax.reload();
                            $('.contactIds').prop('checked', false).removeAttr('checked');
                            alertMessage(message, 'success');
                        } else {
                            Swal.fire(
                                'Warning!',
                                data.message,
                                'warning'
                            )
                        }
 
                    },
                    error: function(data) {
                        $("#loader").hide();
                    }
                });
            }
        })
    }
 
 
    function deleteQuoteRequest(e, id = '') {
        e.preventDefault();
        let ids = '';
        if (id == '') {
            ids = $("input:checkbox[class=quoteIds]:checked").map(function() {
                return this.value;
            }).get();
 
            if (ids.length < 1) {
                alertMessage('warning', 'Please select row', );
                return;
            }
        } else {
            ids = [id];
        }
 
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let route = "{{ route('quote.request.delete') }}"
                $.ajax({
                    type: 'POST',
                    url: route,
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: ids
                    },
                    dataType: "json",
 
                    beforeSend: function() {
                        $("#loader").show();
                    },
                    complete: function() {
                        $("#loader").hide();
                    },
                    success: function(data) {
                        $("#loader").hide();
                        if (data.success == true) {
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            )
                            $('#quoteRequestTable').DataTable().ajax.reload();
                            $('.quoteIds').prop('checked', false).removeAttr('checked');
                            alertMessage(message, 'success');
                        } else {
                            Swal.fire(
                                'Warning!',
                                data.message,
                                'warning'
                            )
                        }
 
                    },
                    error: function(data) {
                        $("#loader").hide();
                    }
                });
            }
        })
    }
 
    function exportSelect(e) {
        e.preventDefault();
        e.stopPropagation();
        let ids = $("input:checkbox[class=contactIds]:checked").map(function() {
            return this.value;
        }).get();
        if (ids.length < 1) {
            alertMessage('warning', 'Please select row', );
            return;
        }
 
        $.ajax({
            url: "{{ route('contacts.export') }}",
            type: 'post',
            data: {
                ids: ids,
                _token: "{{ csrf_token() }}",
            },
            xhrFields: {
                responseType: 'blob'
            },
            beforeSend: function() {
                //
            },
            success: function(response) {
                const link = document.createElement('a');
                let url = window.URL || window.webkitURL;
                let objectUrl = url.createObjectURL(response);
                link.href = objectUrl;
                link.download = 'contact-enquiries.xlsx';
                link.click();
                window.URL.revokeObjectURL(objectUrl);
                $('.quoteIds').prop('checked', false);
                $(".mulltiCheckBox").prop('checked', false);
                // $('.sub_chk').prop('checked', false);
 
            },
            error: function(data) {
                console.log(data);
 
            }
        });
 
 
    }
 
    function exportQuoteSelect(e) {
        e.preventDefault();
        e.stopPropagation();
        let ids = $("input:checkbox[class=quoteIds]:checked").map(function() {
            return this.value;
        }).get();
        if (ids.length < 1) {
            alertMessage('warning', 'Please select row', );
            return;
        }
 
        $.ajax({
            url: "{{ route('quote.export') }}",
            type: 'post',
            data: {
                ids: ids,
                _token: "{{ csrf_token() }}",
            },
            xhrFields: {
                responseType: 'blob'
            },
            beforeSend: function() {
                //
            },
            success: function(response) {
                const link = document.createElement('a');
                let url = window.URL || window.webkitURL;
                let objectUrl = url.createObjectURL(response);
                link.href = objectUrl;
                link.download = 'quote-requests.xlsx';
                link.click();
                window.URL.revokeObjectURL(objectUrl);
                $('.quoteIds').prop('checked', false);
                $(".mulltiCheckBox").prop('checked', false);
                // $('.sub_chk').prop('checked', false);
 
            },
            error: function(data) {
                console.log(data);
 
            }
        });
    }
 
    function viewRequestQuote(value, id) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#quoteModal").modal('show');
            $("#quoteModal .heading").text("Request Details");
 
            let route = "{{ route('admin.quote.getbyid', ':id') }}";
            route = route.replace(':id', id);
            $.ajax({
                type: 'GET',
                url: route,
                success: function(data) {
                    console.log(data.id);
                    $(".id").val(data.id);
                    $(".name").val(data.name).trigger('change');
                    $(".email").val(data.email).trigger('change');
                    $(".phone").val(data.phone).trigger('change');
                    $(".message").val(data.message).trigger('change');
                },
                error: function(data) {
                    if (data.responseJSON?.permissionMessage) {
                        alertMessage(data.responseJSON.permissionMessage, "warning");
                    }
                }
            });
        } else {
            $("#quoteModal").modal('hide');
        }
 
    }
 
    function cropImage(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#crop-modal").modal('show');
            $("#crop-modal .heading").text("Crop Image");
        }
    }
</script>
 