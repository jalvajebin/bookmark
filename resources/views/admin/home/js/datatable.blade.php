<script>
    var datatable;

    function dataTable() {
        $(function() {
            datatable = $('#teamTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('admin.team.getData') }}',
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
                        data: 'heading',
                        name: 'heading'
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            var deleteForm = '';
                            var editForm = '';

                            var deleteForm = `<li class="delete_course" data-bs-toggle="tooltip" data-bs-placement="top" data-id="" aria-label="Delete">
                                            <button type="button" onclick="deleteTestimonial(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                            var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <button type="button" onclick="editTestimonial(${data})" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></button>
                                        </li>`


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
