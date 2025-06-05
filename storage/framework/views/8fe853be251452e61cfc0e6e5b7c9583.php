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
    });

    function triggerBanner1FileInput() {
        document.getElementById('banner1-input').click();
    }
    
    // // contact 
    function logo1InputTrigger() {
        document.getElementById('contact1_input').click();
    }

    function previewContact1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('logo1');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
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
            url: "<?php echo e(route('admin.banner.add')); ?>",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data, 'af');
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
                var description = data.responseJSON.errors.description;
                var banner_image = data.responseJSON.errors.banner_image;

                $('.banner_title-validation').html(banner_title);
                $('.banner_image-validation').html(banner_image);
                $('.description-validation').html(description);
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
            url: "<?php echo e(route('admin.contact.add')); ?>",
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
            url: "<?php echo e(route('admin.social.add')); ?>",
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

    function deleteApplication(e, id = '') {
        e.preventDefault();
        let ids = '';
        if (id == '') {
            ids = $("input:checkbox[class=applicationIds]:checked").map(function() {
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
                let route = "<?php echo e(route('application.cv.delete')); ?>"
                $.ajax({
                    type: 'POST',
                    url: route,
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
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
                            $('#cvTable').DataTable().ajax.reload();
                            $('.applicationIds').prop('checked', false).removeAttr('checked');
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
        let ids = $("input:checkbox[class=applicationIds]:checked").map(function() {
            return this.value;
        }).get();
        if (ids.length < 1) {
            alertMessage('warning', 'Please select row', );
            return;
        }

        $.ajax({
            url: "<?php echo e(route('applications.export')); ?>",
            type: 'post',
            data: {
                ids: ids,
                _token: "<?php echo e(csrf_token()); ?>",
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
                link.download = 'applications.xlsx';
                link.click();
                window.URL.revokeObjectURL(objectUrl);
                $('.applicationIds').prop('checked', false);
                $(".mulltiCheckBox").prop('checked', false);
                // $('.sub_chk').prop('checked', false);

            },
            error: function(data) {
                console.log(data);

            }
        });


    }

      function exportVacancySelect(e) {
        // alert();
        e.preventDefault();
        e.stopPropagation();
        let ids = $("input:checkbox[class=vacancyApplicationIds]:checked").map(function() {
            return this.value;
        }).get();
        if (ids.length < 1) {
            alertMessage('warning', 'Please select row', );
            return;
        }

        $.ajax({
            url: "<?php echo e(route('applications-vacancy.export')); ?>",
            type: 'post',
            data: {
                ids: ids,
                _token: "<?php echo e(csrf_token()); ?>",
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
                link.download = 'vacancy-application.xlsx';
                link.click();
                window.URL.revokeObjectURL(objectUrl);
                $('.vacancyApplicationIds').prop('checked', false);
                $(".mulltiCheckBox").prop('checked', false);
                // $('.sub_chk').prop('checked', false);

            },
            error: function(data) {
                console.log(data);

            }
        });


    }

    function deleteVacancyApplication(e, id = '') {
        e.preventDefault();
        let ids = '';
        if (id == '') {
            ids = $("input:checkbox[class=vacancyApplicationIds]:checked").map(function() {
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
                let route = "<?php echo e(route('application.vacancy.delete')); ?>"
                $.ajax({
                    type: 'POST',
                    url: route,
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
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
                            $('#postVacancyTable').DataTable().ajax.reload();
                            $('.vacancyApplicationIds').prop('checked', false).removeAttr('checked');
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


  
</script>
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/cv/js/script.blade.php ENDPATH**/ ?>