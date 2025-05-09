 <script>
    $(document).ready(function() {
        dataTable();

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

    function triggerImage1FileInput() {
        document.getElementById('image1_name').click();
    }

    function triggerImage2FileInput() {
        document.getElementById('image2_name').click();
    }

    function triggerMisionFileInput() {
        document.getElementById('mission_image').click();
    }

    function triggerVisionFileInput() {
        document.getElementById('vision_image').click();
    }

    function previewImage1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image1Preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewImage2(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image2Preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }


    function previewMision(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('missionImagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewVision(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('visionImagePreview');
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

    $('#whyCooseUsFormSubmit').submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var dataContent = $(this).data('content');
        var formData = new FormData(this);
        $('.error-validation').html('');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.why-choose-us.add') }}",
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
                var description = data.responseJSON.errors.description;
                var image1alt = data.responseJSON.errors.image1alt;
                var image2alt = data.responseJSON.errors.image2alt;
                var image1 = data.responseJSON.errors.image1_name;
                var image2 = data.responseJSON.errors.image2_name;

                $('.heading-validation').html(heading);
                $('.title-validation').html(title);
                $('.description-validation').html(description);
                $('.image1alt-validation').html(image1alt);
                $('.image2alt-validation').html(image2alt);
                $('.image1-validation').html(imag1_name);
                $('.image2-validation').html(imag2_name);

            }
        });
    });

    $('#missionVisionFormSubmit').submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var dataContent = $(this).data('content');
        var formData = new FormData(this);
        $('.error-validation').html('');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.mission-vision.add') }}",
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
                var missionTitle = data.responseJSON.errors.mission_title;
                var missionDescription = data.responseJSON.errors.mission_description;
                var visionTitle = data.responseJSON.errors.vision_title;
                var visionDescription = data.responseJSON.errors.vision_description;
                var missionImage = data.responseJSON.errors.mission_image;
                var visionImage = data.responseJSON.errors.vision_image;
                var missionImageAlt = data.responseJSON.errors.mission_image_alt;
                var visionImageAlt = data.responseJSON.errors.vision_image_alt;       
                
                $('.mission_title_validation ').html(missionTitle);
                $('.mission_description_validation ').html(missionDescription)
                $('.vision_title_validation ').html(visionTitle)
                $('.vision_description_validation ').html(visionDescription)
                $('.mission_image_validation ').html(missionImage);
                $('.mission_image_alt_validation ').html(missionImageAlt)
                $('.vision_image_validation ').html(visionImage)
                $('.vision_image_alt_validation ').html(visionImageAlt)
            }
        });
    });

    $('#aboutUsFormSubmit').submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var dataContent = $(this).data('content');
        var formData = new FormData(this);
        $('.error-validation').html('');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.about-us.add') }}",
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
                var title = data.responseJSON.errors.title;
                var heading = data.responseJSON.errors.heading;
                var short_description = data.responseJSON.errors.short_description;
                var description = data.responseJSON.errors.description;
                var count_1_name = data.responseJSON.errors.count_1_name;
                var count1 = data.responseJSON.errors.count1;
                var count_2_name = data.responseJSON.errors.count_2_name;
                var count2 = data.responseJSON.errors.count2;
                var count_3_name = data.responseJSON.errors.count_3_name;
                var count3 = data.responseJSON.errors.count3;
               
                $('.title-validation').html(title);
                $('.heading-validation').html(heading);
                $('.short_description_validation').html(short_description);
                $('.description-validation').html(description);
                $('.count_1_name_validation').html(count_1_name);
                $('.count_2_name_validation').html(count_2_name);
                $('.count_3_name_validation').html(count_3_name);
                $('.count1-validation').html(count1);
                $('.count2-validation').html(count2);
                $('.count3-validation').html(count3);

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
                alertMessage('Please select row', 'warning');
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

    function exportSelect(e) {
        e.preventDefault();
        e.stopPropagation();
        let ids = $("input:checkbox[class=contactIds]:checked").map(function() {
            return this.value;
        }).get();
        if (ids.length < 1) {
            alertMessage('Please select row', 'warning');
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
</script> 
