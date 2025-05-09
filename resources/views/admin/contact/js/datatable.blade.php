<script>
    var datatable;
    var datatable1;


    function dataTable() {
        $(function() {
            datatable = $('#contactEnquiryTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('get.contact.enquiry') }}',
                    type: "get",
                    data: function(d) {

                    }
                },
                "order": [
                    [0, "desc"]
                ],
                "paging": true,
                columns: [{
                        data: 'id',
                        name: "id",
                        orderable: false,
                        render: function(data, type, row) {
                            return `<input type="checkbox" style='text-align: center;width:48px;height:15px;' class="contactIds" value="${data}"/> `;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'email',
                        name: "email"
                    },
                    {
                        data: 'phone',
                        name: "phone"
                    },
                    {
                        data: 'subject',
                        name: "subject"
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

                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            let messageBtn = '';
                            if (row.message_id) {
                                messageBtn = `<a href="#" onclick="checkEmail('${row.message_id}')" class="btn btn-sm btn-soft-primary">
                                                            check Email Delivery
                                                        </a>`;
                            }

                            return `<ul class="list-unstyled hstack gap-1 mb-0">
                                                     <a href="#" onclick="deleteContactEnquiry(event,${data})" class="btn btn-sm btn-soft-danger">
                                                        <i class="mdi mdi-delete-outline"></i>
                                                        </a>
                                                         ${messageBtn}
                                                </ul>`;
                        }
                    }
                ],
                "initComplete": function() {
                    var i = 0;
                    var hasData = this.api().data().any();

                    this.api().columns().every(function() {
                        var column = this;
                        if (i == 0) {
                            var input =
                                "<input  class='mulltiCheckBox' " +
                                " type='checkbox'  style='text-align: center; width:20px;height:15px;margin-left:15px;'>" +
                                "</input>";
                            $(input).appendTo($(column.header()).empty())
                                .on('change', function() {
                                    if (this.checked) {
                                        $(".contactIds:enabled").prop('checked',
                                            'true');
                                    } else {
                                        $('.contactIds').prop('checked', false)
                                            .removeAttr('checked');
                                    }
                                });
                        }
                        i++;

                    });
                }
            });
        });

    }

    function dataTable1() {
        $(function() {
            dataTable1 = $('#quoteRequestTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('get.request.quote') }}',
                    type: "get",
                    data: function(d) {

                    }
                },
                "order": [
                    [0, "desc"]
                ],
                "paging": true,
                columns: [{
                        data: 'id',
                        name: "id",
                        orderable: false,
                        render: function(data, type, row) {
                            return `<input type="checkbox" style='text-align: center;width:48px;height:15px;' class="quoteIds" value="${data}"/> `;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'email',
                        name: "email"
                    },
                    {
                        data: 'phone',
                        name: "phone"
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
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            var deleteForm = '';
                            var editForm = '';
                            let messageBtn = '';

                            if (row.message_id) {
                                messageBtn = `<a href="#" onclick="checkEmail('${row.message_id}')" class="btn btn-sm btn-soft-primary">
                                                Check Email Delivery
                                              </a>`;
                            }

                            var deleteForm = `<li class="delete_course" data-bs-toggle="tooltip" data-bs-placement="top" data-id="" aria-label="Delete">
                                            <button type="button" onclick="deleteQuoteRequest(event,${data})" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></button>
                                        </li>`;

                            var viewForm = `<li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                            <button type="button" onclick="viewRequestQuote(1, ${data})" class="btn btn-sm btn-soft-info"><i class="mdi mdi-eye-outline"></i></i></button>
                                        </li>`


                            return `<ul class="list-unstyled hstack gap-1 mb-0">
                                        ${deleteForm}
                                        ${viewForm}
                                        ${messageBtn}
                                    </ul>`;
                        }
                    }
                ],
            });
        });
    }
</script>
