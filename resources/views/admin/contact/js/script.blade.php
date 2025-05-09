{{-- <script>
    // $(document).ready(function() {
    //     dataTable();
    //     dataTable2();
    //     $("#page").val('contact');
    //     $("#page_banner").val('contact');
    //     var toolbar = [
    //         ['style', ['bold', 'italic', 'underline', 'clear']],
    //         ['font', []],
    //         ['color', ['color']],
    //         ['para', ['ul', 'ol', 'paragraph']],
    //         ['height', ['height']],
    //         ['view', ['fullscreen', 'codeview']],
    //     ]
    //     CKEDITOR.config.coreStyles_bold = {
    //         element: 'b',
    //         overrides: 'strong'
    //     };
    //     CKEDITOR.replace('privacy', {
    //         format_tags: 'p;h1;h2;h3;h4;h5;h6;pre'

    //     });
    //     CKEDITOR.replace('terms', {
    //         format_tags: 'p;h1;h2;h3;h4;h5;h6;pre'

    //     });
    // });


    function logo1InputTrigger() {
        document.getElementById('logo1Input').click();
    }

    $("#contactForm #logo1Input").on('change', function() {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('logo1');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    function bannerInputTrigger() {
        document.getElementById('bannerInput').click();
    }

    $("#contactBannerForm #bannerInput").on('change', function() {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('banner');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    function logo1InputTrigger1() {
        document.getElementById('logo2Input').click();
    }

    $("#contactForm #logo2Input").on('change', function() {
        const file = event.target.files[0];

        if (file) {
            const fileName = file.name;
            $(".pdfFileName").text(fileName).show();
        }
    });

    function branchInputTrigger() {
        document.getElementById('branchInput').click();
    }

    $("#branchForm #branchInput").on('change', function() {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('branchImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });

    function addContactBanner(e) {
        e.preventDefault();
        e.stopPropagation();
        $('.error-validation').html('');
        $("#loader").show();
        let formData = new FormData($("#contactBannerForm")[0]);
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.contact.banner.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#loader").hide();
                let message = data.message;
                if (data.success == true) {
                    alertMessage(message, 'success');
                } else if (data.success == false) {
                    alertMessage(message, 'warning');
                }
            },
            error: function(data) {
                $("#loader").hide();
                $('.heading_validation').html(data.responseJSON.errors.heading_en);
                $('.title_validation').html(data.responseJSON.errors.title_en);
            }
        });
    }

    function addContact(e) {
        e.preventDefault();
        e.stopPropagation();
        $('.error-validation').html('');
        $("#loader").show();
        let formData = new FormData($("#contactForm")[0]);
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.contact.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#loader").hide();
                let message = data.message;
                if (data.success == true) {
                    alertMessage(message, 'success');
                } else if (data.success == false) {
                    alertMessage(message, 'warning');
                }
            },
            error: function(data) {
                $("#loader").hide();
                $('.heading_validation').html(data.responseJSON.errors.heading_en);
                $('.title_validation').html(data.responseJSON.errors.title_en);
                $(".phone_validation").html(data.responseJSON.errors.phone);
                $(".email_validation").html(data.responseJSON.errors.email);
                $(".discription_validation").html(data.responseJSON.errors.address_en);
                $(".hours_validation").html(data.responseJSON.errors.address_ar);
                $(".copyright_validation").html(data.responseJSON.errors.map_link);
                $(".logo1_validation").html(data.responseJSON.errors.logo1);
                $(".logo2_validation").html(data.responseJSON.errors.logo2);
            }
        });


    }

    function addBranchForm(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#branchForm")[0].reset();
            $("#accoButton").text("Add");
            $("#branchModal").modal('show');
            $("#branchModal .branch_heading").text("Add Branch");
            $("#branchForm #branchImage").attr('src', "{{ asset('admin/images/no-image.png') }}");
        } else if (value == 2) {
            $("#accoButton").text("Update");
            $("#branchModal").modal('show');
            $("#branchModal .branch_heading").text("Update Branch")
        } else {
            $("#branchModal").modal('hide');
        }
    }

    function addBranch(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".error-validation").html('');
        var formData = new FormData($("#branchForm")[0]);
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.branch.add') }}',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#loader").show();
            },
            complete: function() {
                $("#loader").hide();
            },
            success: function(data) {
                $("#loader").hide();
                var message = data.message;
                if (data.success == true) {
                    $('#branchTable').DataTable().ajax.reload();
                    $("#branchForm")[0].reset();
                    $("#loader").hide();
                    alertMessage(message, 'success');
                    addBranchForm(3);
                } else {
                    alertMessage(message, 'warning');
                }
            },
            error: function(data) {
                $("#loader").hide();
                // $('.description_validation').html(data.responseJSON.errors.banner_description);

                $(".name_validation").html(data.responseJSON.errors.name);
                $(".location_validation").html(data.responseJSON.errors.location);
                $(".phone_validation").html(data.responseJSON.errors.phone);
                $(".email_validation").html(data.responseJSON.errors.email);
                $(".branch_validation").html(data.responseJSON.errors.branch);
                $(".address_validation").html(data.responseJSON.errors.address);
                $(".maplink_validation").html(data.responseJSON.errors.maplink);

            }
        });
    }

    function statusChangeBranch(id, status) {
        if (status == 1) {
            status = 0;
        } else {
            status = 1;
        }
        $.ajax({
            type: "post",
            data: {
                id: id,
                status: status,
                _token: "{{ csrf_token() }}"
            },
            url: "{{ route('admin.branch.statuschange') }}",
            success: function(response) {
                $('#branchTable').DataTable().ajax.reload();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.message, 1);
            },
            error: function() {
                $('#branchTable').DataTable().ajax.reload();
                console.log('error');
            }
        })
    }

    function editBranch(id) {
        let route = "{{ route('admin.branch.getbyid', ':id') }}";
        route = route.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: route,
            success: function(data) {
                console.log(data);
                $("#id").val(data.id);
                $(".name").val(data.name);
                $(".location").val(data.location);
                $(".phone").val(data.phone);
                $(".email").val(data.email);
                $(".address").val(data.address);
                $(".maplink").val(data.maplink);
                $(".image_class").attr('src', data.branches?.url);
                $("#name").val(data.name);
                addBranchForm(2);
            },
            error: function(data) {}
        });
    }

    function deleteBranch(id) {
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
                let route = "{{ route('admin.branch.delete', ':id') }}?_token={{ csrf_token() }}"
                route = route.replace(':id', id);
                formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', id);
                $.ajax({
                    type: 'DELETE',
                    url: route,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $("#loader").show();
                    },
                    complete: function() {
                        $("#loader").hide();
                    },
                    success: function(data) {
                        $("#loader").hide();
                        $('#branchTable').DataTable().ajax.reload();
                        alertMessage(message, 'success');
                    },
                    error: function(data) {
                        $("#loader").hide();
                    }
                });
            }
        })
    }

    function addSocial(e) {
        e.preventDefault();
        e.stopPropagation();
        $('.error-validation').html('');
        $("#loader").show();
        let formData = new FormData($("#socialForm")[0]);
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.contact.social.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#loader").hide();
                let message = data.message;
                if (data.success == true) {
                    $("#socialForm #social_id").val(data.id);
                    alertMessage(message, 'success');
                } else if (data.success == false) {
                    alertMessage(message, 'warning');
                }
            },
            error: function(data) {
                $("#loader").hide();
                $('.instagram_validation').html(data.responseJSON.errors.instagram);
                $('.twitter_validation').html(data.responseJSON.errors.twitter);
                $('.facebook_validation').html(data.responseJSON.errors.facebook);
                $('.linkedin_validation').html(data.responseJSON.errors.linkedin);
            }
        });
    }

    function addPolicy(e) {
        e.preventDefault();
        e.stopPropagation();
        $('.error-validation').html('');
        $("#loader").show();
        let privacy = CKEDITOR.instances['privacy'].getData();
        let terms = CKEDITOR.instances['terms'].getData();
        let formData = new FormData($("#contactPrivacyForm")[0]);
        formData.append('privacy', privacy);
        formData.append('terms', terms);
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.privacy.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#loader").hide();
                let message = data.message;
                if (data.success == true) {
                    alertMessage(message, 'success');
                } else if (data.success == false) {
                    alertMessage(message, 'warning');
                }
            },
            error: function(data) {
                $("#loader").hide();
                $('.privacy_validation').html(data.responseJSON.errors.privacy);
                $('.terms_validation').html(data.responseJSON.errors.terms);
            }
        });
    }
</script> --}}
<script>
     $(document).ready(function() {
       
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

</script>
