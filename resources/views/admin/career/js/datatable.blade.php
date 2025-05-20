<script>
    var datatable;
    var datatable1;


    function dataTable() {
        $(function() {
            datatable = $('#careerTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('admin.career.getData') }}',
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
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            var deleteForm = '';
                            var editForm = '';

                            var deleteForm = `<li class="delete_course" data-bs-toggle="tooltip" data-bs-placement="top" data-id="" aria-label="Delete">
                                            <button type="button" onclick="deleteCareer(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                            var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                        <a href="/admin/career/edit/${data}" class="btn btn-sm btn-soft-info">
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

     function dataTable1() {
        $(function() {
            datatable = $('#tagTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('admin.tag.getData') }}',
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
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            var deleteForm = '';
                            var editForm = '';

                            var deleteForm = `<li class="delete_course" data-bs-toggle="tooltip" data-bs-placement="top" data-id="" aria-label="Delete">
                                            <button type="button" onclick="deleteCareer(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                            var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                        <a href="/admin/career/edit/${data}" class="btn btn-sm btn-soft-info">
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
