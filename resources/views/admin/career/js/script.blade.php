<script>
    $(document).ready(function() {
        dataTable();
        dataTable1();


        $('#date').datetimepicker({
            format: 'DD-MM-YYYY',
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

    function Image1InputTrigger() {
        document.getElementById('image1').click();
    }

    function previewImage1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview1');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function triggerCounter1FileInput() {
        document.getElementById('counter1_image_name').click();
    }

    function previewCounter1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('counter1ImagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function triggerCounter2FileInput() {
        document.getElementById('counter2_image_name').click();
    }

    function previewCounter2(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('counter2ImagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function triggerCounter3FileInput() {
        document.getElementById('counter3_image_name').click();
    }

    function previewCounter3(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('counter3ImagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function triggerCounter4FileInput() {
        document.getElementById('counter4_image_name').click();
    }

    function previewCounter4(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('counter4ImagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }


    function ImageInputTrigger() {
        document.getElementById('image').click();
    }

    function PreviewImage1(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('ImagePreview');
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


    function deleteCareer(id) {
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
                let route = "{{ route('admin.career.delete', ':id') }}?_token={{ csrf_token() }}"
                route = route.replace(':id', id);
                formData = new FormData();
                // formData.append('_token', "{{ csrf_token() }}");
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
                        let message = data.message;
                        $("#loader").hide();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        $('#careerTable').DataTable().ajax.reload();
                        alertMessage(message, 'successfully deleted');
                    },
                    error: function(data) {
                        $("#loader").hide();
                        if (data.responseJSON?.permissionMessage) {
                            alertMessage(data.responseJSON.permissionMessage, "warning");
                        }
                    }
                });
            }
        })
    }



    function tagAddForm(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#tagForm")[0].reset();
            $("#tagModal").modal('show');
            $("#tagModal .heading").text("Add Tag");
        } else if (value == 2) {
            $("#tagModal").modal('show');
            $("#tagModal .heading").text("Edit Tag");
        } else {
            $("#tagModal").modal('hide');
        }

    }

    function addtag(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".error-validation").html('');
        var formData = new FormData($("#tagForm")[0]);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: '{{ route('career.tag.store') }}',
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
                if (data.status == true) {
                    console.log(data);
                    $("#tagForm")[0].reset();
                    $('#tagTable').DataTable().ajax.reload();
                    tagAddForm(3);
                    alertMessage('success', message);
                } else if (data.status == false) {
                    alertMessage('error', message);
                }
            },
            error: function(data) {
                $("#loader").hide();
                if (data.responseJSON?.permissionMessage) {
                    alertMessage(data.responseJSON.permissionMessage, "warning");
                }
                var title = data.responseJSON.errors.title;
                $('.title_validation ').html(title);


            }
        });

    }

    function edittag(id) {
        let route = "{{ route('career.tag.edit', ':id') }}";
        route = route.replace(':id', id);
        var formData = new FormData($("tagForm")[0]);
        $.ajax({
            type: 'GET',
            url: route,
            success: function(data) {
                console.log(data.id);
                $(".tag_id").val(data.id);
                $(".title").val(data.title).trigger('change');
                tagAddForm(2);
            },
            error: function(data) {
                if (data.responseJSON?.permissionMessage) {
                    alertMessage(data.responseJSON.permissionMessage, "warning");
                }
            }
        });
    }

    function deletetag(id) {
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
                let route = "{{ route('delete-tag', ':id') }}?_token={{ csrf_token() }}"
                route = route.replace(':id', id);
                formData = new FormData();
                // formData.append('_token', "{{ csrf_token() }}");
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
                        let message = data.message;
                        $("#loader").hide();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        $('#tagTable').DataTable().ajax.reload();
                        alertMessage(message, 'successfully deleted');
                    },
                    error: function(data) {
                        $("#loader").hide();
                        if (data.responseJSON?.permissionMessage) {
                            alertMessage(data.responseJSON.permissionMessage, "warning");
                        }
                    }
                });
            }
        })
    }
</script>
