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


    function deleteService(id) {
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
                let route =
                    "{{ route('destroyServicePro', ':id') }}?_token={{ csrf_token() }}"
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
                        $('#serviceWeProYajTable').DataTable().ajax.reload();
                        alertMessage(message, 'successfully deleted');
                    },
                    error: function(data) {
                        $("#loader").hide();
                        if (data.responseJSON?.permissionMessage) {
                            alertMessage(data.responseJSON.permissionMessage,
                                "warning");
                        }
                    }
                });
            }
        })
    }
</script>
