<script>
    var datatable;
    var datatabl2;

    function dataTable() {
        $(function() {
            datatable = $('#enquiryTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                dom: 'Blrtip',
                ajax: {
                    url: '{{ route('admin.contact.enquiry') }}',
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'message',
                        name: "message",
                        render: function(data, type, row) {
                            var maxLength = 50;
                            if (data.length > maxLength) {
                                return '<span data-toggle="tooltip" title="' + data + '">' +
                                    data.substr(0, maxLength) + '...</span>';
                            }
                            return data;
                        }
                    },
                ],
            });
        });

    }

    function dataTable2() {
        $(function() {
            datatable2 = $('#branchTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: false,
                dom: 'Blrtip',
                ajax: {
                    url: '{{ route('admin.branch.getdata') }}',
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
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return `<a href="${data}" target="_blank" ><img src="${data}"  alt="image" width=70 height=50></a>`;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'status',
                        name: "status",
                        render: function(data, type, row) {
                            if (data == "1") {
                                var status = "checked";
                            } else {
                                var status = '';
                            }
                            return `<div class="form-check form-switch">
                                        <input class="form-check-input status" type="checkbox" onchange="statusChangeBranch(${row.id},${data})" role="switch" value="${data}" ${status}>
                                    </div>`
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            return `<ul class="list-unstyled hstack gap-1 mb-0">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <a href="javascript:void(0);" onclick="editBranch(${row.id})" class="btn btn-sm btn-soft-info">
                                                <i class='bx bxs-edit-alt'></i>
                                            </a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                                            <a href="javascript:void(0);" onclick="deleteBranch(${row.id})" class="btn btn-sm btn-soft-danger deleteIcon">
                                                <i class='bx bx-trash' ></i>
                                            </a>
                                        </li>
                                    </ul>
                                    `;
                        }
                    }
                ],
            });
        });

    }
</script>
