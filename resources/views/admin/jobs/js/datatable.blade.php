<script>
        var datatable;
        var datatable1;
        var datatable2;
        var datatable3;
        var datatable4;
        var datatable5;

        function dataTable() {
        $(function() {
            datatable = $('#categoryTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('jobs.category.getData') }}',
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
                                            <button type="button" onclick="deleteCategory(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                            var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <button type="button" onclick="editCategory(${data})" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></button>
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

        function dataTable1() {
            $(function() {
                datatable = $('#locationTable').DataTable({
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    responsive: false,
                    destroy: true,
                    searching: true,
                    ajax: {
                        url: '{{ route('jobs.location.getData') }}',
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
                                            <button type="button" onclick="deleteLocation(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                                 var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <button type="button" onclick="editLocation(${data})" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></button>
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

        function dataTable2() {
            $(function() {
                datatable = $('#schoolTypeTable').DataTable({
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    responsive: false,
                    destroy: true,
                    searching: true,
                    ajax: {
                        url: '{{ route('jobs.school-type.getData') }}',
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
                                            <button type="button" onclick="deleteSchoolType(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                                 var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <button type="button" onclick="editSchoolType(${data})" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></button>
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

        function dataTable3() {
            $(function() {
                datatable = $('#specialismTable').DataTable({
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    responsive: false,
                    destroy: true,
                    searching: true,
                    ajax: {
                        url: '{{ route('jobs.specialism.getData') }}',
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
                                            <button type="button" onclick="deleteSpecialism(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                                 var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <button type="button" onclick="editSpecialism(${data})" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></button>
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

        function dataTable4() {
            $(function() {
                datatable = $('#positionTypeTable').DataTable({
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    responsive: false,
                    destroy: true,
                    searching: true,
                    ajax: {
                        url: '{{ route('jobs.position-type.getData') }}',
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
                                            <button type="button" onclick="deletePositionType(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                                 var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <button type="button" onclick="editPositionType(${data})" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></button>
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

        function dataTable5() {
            $(function() {
                datatable = $('#jobTable').DataTable({
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    responsive: false,
                    destroy: true,
                    searching: true,
                    ajax: {
                        url: '{{ route('admin.job.getData') }}',
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
                                            <button type="button" onclick="deleteJob(${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                                var editForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                        <a href="/admin/jobs/edit/${data}" class="btn btn-sm btn-soft-info">
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



