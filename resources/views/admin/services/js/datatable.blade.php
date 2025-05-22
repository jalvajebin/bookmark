<script>
    var datatable;

    function dataTable() {
        $(function() {
            datatable = $('#serviceWeProYajTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('index') }}',
                    type: "get",
                    data: function(d) {

                    }
                },
                "order": [
                    [0, "desc"]
                ],
                "paging": true,
                columns: [{
                        data: 'DT_RowIndex',
                        name: "id",
                        orderable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {

                            if (data == 1) {
                                var status = "checked";
                            } else {
                                var status = '';
                            }
                            return `
                                    <div class="form-check form-switch">
                                        <input class="form-check-input course-status" type="checkbox" role="switch" id="customSwitch1${row.id}" onchange="statusChange(${row.id},${data})" ${status} >
                                    </div>
                                    `;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            var deleteForm = '';
                            var editForm = '';

                            var deleteForm = `<li class="delete_course" data-bs-toggle="tooltip" data-bs-placement="top" data-id="" aria-label="Delete">
                                            <button type="button" onclick="deleteService(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                            var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                        <a href="/admin/serviceweprovide/edit/${data}" class="btn btn-sm btn-soft-info">
                                            <i class="mdi mdi-pencil-outline"></i>
                                        </a>
                                    </li>`;


                            return `<ul class="list-unstyled hstack gap-1 mb-0">
                                        ${editForm}
                                        ${deleteForm}
                                    </ul>`;
                        }
                    }
                ],

            });
        });
    }
</script>