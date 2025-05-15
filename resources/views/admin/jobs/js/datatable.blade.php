<script>
    $(document).ready(function () {
        $('#jobTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("admin.job.getData") }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' }, // must match your DB column
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
</script>
