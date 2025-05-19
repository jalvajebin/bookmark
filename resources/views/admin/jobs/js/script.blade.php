<script>
    $(document).ready(function() {
        dataTable();
        dataTable1();
        dataTable2();
        dataTable3();
        dataTable4();
        dataTable5();

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

    function triggerMainFileInput() {
        document.getElementById('main-input').click();
    }

    function previewMain(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('mainPreview');
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

    function deleteJob(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/jobs/delete/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.message || 'Job deleted successfully.',
                            'success'
                        );
                        $('#jobTable').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    }



    function categoryAddForm(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#categoryForm")[0].reset();
            $("#categoryModal").modal('show');
            $("#categoryModal .heading").text("Add Category");
        } else if (value == 2) {
            $("#categoryModal").modal('show');
            $("#categoryModal .heading").text("Edit Category");
        } else {
            $("#categoryModal").modal('hide');
        }

    }

    function addCategory(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".error-validation").html('');
        var formData = new FormData($("#categoryForm")[0]);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: '{{ route('jobs.category.store') }}',
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
                    $("#categoryForm")[0].reset();
                    $('#categoryTable').DataTable().ajax.reload();
                    categoryAddForm(3);
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

    function editCategory(id) {
        let route = "{{ route('jobs.category.edit', ':id') }}";
        route = route.replace(':id', id);
        var formData = new FormData($("categoryForm")[0]);
        $.ajax({
            type: 'GET',
            url: route,
            success: function(data) {
                console.log(data.id);
                $(".category_id").val(data.id);
                $(".title").val(data.title).trigger('change');
                categoryAddForm(2);
            },
            error: function(data) {
                if (data.responseJSON?.permissionMessage) {
                    alertMessage(data.responseJSON.permissionMessage, "warning");
                }
            }
        });
    }

    function deleteCategory(id) {
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
                let route = "{{ route('delete-category', ':id') }}?_token={{ csrf_token() }}"
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
                        $('#categoryTable').DataTable().ajax.reload();
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

    function locationAddForm(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#locationForm")[0].reset();
            $("#locationModal").modal('show');
            $("#locationModal .heading").text("Add Location");
        } else if (value == 2) {
            $("#locationModal").modal('show');
            $("#locationModal .heading").text("Edit Location");
        } else {
            $("#locationModal").modal('hide');
        }

    }

    function addLocation(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".error-validation").html('');
        var formData = new FormData($("#locationForm")[0]);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: '{{ route('jobs.location.store') }}',
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
                    $("#locationForm")[0].reset();
                    $('#locationTable').DataTable().ajax.reload();
                    locationAddForm(3);
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

    function editLocation(id) {
        let route = "{{ route('jobs.location.edit', ':id') }}";
        route = route.replace(':id', id);
        var formData = new FormData($("locationForm")[0]);
        $.ajax({
            type: 'GET',
            url: route,
            success: function(data) {
                console.log(data.id);
                $(".location_id").val(data.id);
                $(".title").val(data.title).trigger('change');
                locationAddForm(2);
            },
            error: function(data) {
                if (data.responseJSON?.permissionMessage) {
                    alertMessage(data.responseJSON.permissionMessage, "warning");
                }
            }
        });
    }

    function deleteLocation(id) {
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
                let route = "{{ route('delete-location', ':id') }}?_token={{ csrf_token() }}"
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
                        $('#locationTable').DataTable().ajax.reload();
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

    function schoolTypeAddForm(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#schoolTypeForm")[0].reset();
            $("#schoolTypeModal").modal('show');
            $("#schoolTypeModal .heading").text("Add School Type");
        } else if (value == 2) {
            $("#schoolTypeModal").modal('show');
            $("#schoolTypeModal .heading").text("Edit School Type");
        } else {
            $("#schoolTypeModal").modal('hide');
        }

    }

    function addSchoolType(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".error-validation").html('');
        var formData = new FormData($("#schoolTypeForm")[0]);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: '{{ route('jobs.school-type.store') }}',
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
                    $("#schoolTypeForm")[0].reset();
                    $('#schoolTypeTable').DataTable().ajax.reload();
                    schoolTypeAddForm(3);
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

    function editSchoolType(id) {
        let route = "{{ route('jobs.school-type.edit', ':id') }}";
        route = route.replace(':id', id);
        var formData = new FormData($("schoolTypeForm")[0]);
        $.ajax({
            type: 'GET',
            url: route,
            success: function(data) {
                console.log(data.id);
                $(".school_type_id").val(data.id);
                $(".title").val(data.title).trigger('change');
                schoolTypeAddForm(2);
            },
            error: function(data) {
                if (data.responseJSON?.permissionMessage) {
                    alertMessage(data.responseJSON.permissionMessage, "warning");
                }
            }
        });
    }

    function deleteSchoolType(id) {
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
                let route = "{{ route('delete-school-type', ':id') }}?_token={{ csrf_token() }}"
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
                        $('#schoolTypeTable').DataTable().ajax.reload();
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

    function specialismAddForm(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#specialismForm")[0].reset();
            $("#specialismModal").modal('show');
            $("#specialismModal .heading").text("Add Specialism");
        } else if (value == 2) {
            $("#specialismModal").modal('show');
            $("#specialismModal .heading").text("Edit Specialism");
        } else {
            $("#specialismModal").modal('hide');
        }

    }

    function addSpecialism(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".error-validation").html('');
        var formData = new FormData($("#specialismForm")[0]);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: '{{ route('jobs.specialism.store') }}',
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
                    $("#specialismForm")[0].reset();
                    $('#specialismTable').DataTable().ajax.reload();
                    specialismAddForm(3);
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

    function editSpecialism(id) {
        let route = "{{ route('jobs.specialism.edit', ':id') }}";
        route = route.replace(':id', id);
        var formData = new FormData($("specialismForm")[0]);
        $.ajax({
            type: 'GET',
            url: route,
            success: function(data) {
                console.log(data.id);
                $(".specialism_id").val(data.id);
                $(".title").val(data.title).trigger('change');
                specialismAddForm(2);
            },
            error: function(data) {
                if (data.responseJSON?.permissionMessage) {
                    alertMessage(data.responseJSON.permissionMessage, "warning");
                }
            }
        });
    }

    function deleteSpecialism(id) {
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
                let route = "{{ route('delete-specialism', ':id') }}?_token={{ csrf_token() }}"
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
                        $('#specialismTable').DataTable().ajax.reload();
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

    function positionTypeAddForm(value) {
        $(".error-validation").html('');
        if (value == 1) {
            $("#id").val('');
            $("#positionTypeForm")[0].reset();
            $("#positionTypeModal").modal('show');
            $("#positionTypeModal .heading").text("Add Positin Type");
        } else if (value == 2) {
            $("#positionTypeModal").modal('show');
            $("#positionTypeModal .heading").text("Edit Positin Type");
        } else {
            $("#positionTypeModal").modal('hide');
        }

    }

    function addPositionType(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".error-validation").html('');
        var formData = new FormData($("#positionTypeForm")[0]);
        formData.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: '{{ route('jobs.position-type.store') }}',
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
                    $("#positionTypeForm")[0].reset();
                    $('#positionTypeTable').DataTable().ajax.reload();
                    positionTypeAddForm(3);
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

    function editPositionType(id) {
        let route = "{{ route('jobs.position-type.edit', ':id') }}";
        route = route.replace(':id', id);
        var formData = new FormData($("positionTypeForm")[0]);
        $.ajax({
            type: 'GET',
            url: route,
            success: function(data) {
                console.log(data.id);
                $(".position_type_id").val(data.id);
                $(".title").val(data.title).trigger('change');
                positionTypeAddForm(2);
            },
            error: function(data) {
                if (data.responseJSON?.permissionMessage) {
                    alertMessage(data.responseJSON.permissionMessage, "warning");
                }
            }
        });
    }

    function deletePositionType(id) {
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
                let route = "{{ route('delete-position-type', ':id') }}?_token={{ csrf_token() }}"
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
                        $('#positionTypeTable').DataTable().ajax.reload();
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
