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

    //  contact 
    function logo1InputTrigger() {
        document.getElementById('contact1_input').click();
    }

    // service image
    function previewServiceImage(event, previewId) {
        const input = event.target;
        const preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
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
                var banner_image = data.responseJSON.errors.banner_image;


                $('.banner_title-validation').html(banner_title);
                $('.banner_image-validation').html(banner_image);
            }
        });
    });

    $('#serviceFormSubmit').submit(function(e) {
        e.preventDefault();
        $("#loader").show();
        var dataContent = $(this).data('content');
        var formData = new FormData(this);

        $('.error-validation').html('');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.service.add') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            success: function(data) {

                console.log(data, "fucking data");
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
                var title_two = data.responseJSON.errors.title_two;
                var description = data.responseJSON.errors.description;
                var description_two = data.responseJSON.errors.description_two;
                var read_more = data.responseJSON.errors.read_more;
                var read_more_two = data.responseJSON.errors.read_more_two;
                var link = data.responseJSON.errors.link;
                var link_two = data.responseJSON.errors.link_two;

                var service_image = data.responseJSON.errors.service_image;
                var service_image_two = data.responseJSON.errors.service_image_two;


                $('.title-validation').html(title);

                $('.title_two-validation').html(title_two);

                $('.description-validation').html(description);
                $('.description_two-validation').html(description_two);
                $('.read_more-validation').html(read_more);
                $('.read_more_two-validation').html(read_more_two);
                $('.link-validation').html(link);
                $('.link_two-validation').html(link_two);


                $('.service_image-validation').html(service_image);
                $('.service_image_two-validation').html(service_image_two);

            }
        });
    });


        $(document).ready(function() {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $(document).on('click', '.delete-btn', function() {
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
                            url: '/admin/serviceweprovide/service-we-provide-delete/' + id,
                            type: 'DELETE',
                            success: function(res) {
                                Swal.fire({
                                    icon: res.icon ?? 'success',
                                    title: res.title ?? 'Deleted!',
                                    text: res.message ??
                                        'Service has been deleted.'
                                });
                                $('#serviceWeProYajTable').DataTable().ajax.reload();
                            },
                            error: function() {
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
