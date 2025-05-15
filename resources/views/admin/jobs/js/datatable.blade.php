<script>
    $(document).ready(function () {
        $('#jobTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("admin.job.getData") }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { 
                    data: 'id', 
                    name: 'id', 
                    orderable: false, 
                    render: function(data, type, row) {
                        return `
                            <ul class="list-unstyled hstack gap-1 mb-0">
                                <li>
                                    <a href="/admin/jobs/edit/${data}" class="btn btn-sm btn-soft-info">
                                        <i class="mdi mdi-pencil-outline"></i>
                                    </a>
                                </li>
                                <li>
                                    <button onclick="deleteJob(${data})" class="btn btn-sm btn-soft-danger">
                                        <i class="mdi mdi-delete-outline"></i>
                                    </button>
                                </li>
                            </ul>
                        `;
                    }
                }
            ]
        });
    });

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
</script>
