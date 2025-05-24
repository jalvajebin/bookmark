<script>
    var datatable;


    function dataTable() {
        $(function() {
            datatable = $('#cvTable').DataTable({

                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '{{ route('get.cv-appliaction') }}',
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
                            return `<input type="checkbox" style='text-align: center;width:48px;height:15px;' class="applicationIds" value="${data}"/> `;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
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
                        data: 'passport',
                        name: 'passport'
                    },
                    {
                        data: 'birth_country',
                        name: 'birth_country'
                    },
                    {
                        data: 'current_country',
                        name: 'current_country'
                    },
                    {
                        data: 'undergrad_subject',
                        name: 'undergrad_subject'
                    },
                    {
                        data: 'teaching_qualification_subject',
                        name: 'teaching_qualification_subject'
                    },
                    {
                        data: 'current_job_title',
                        name: 'current_job_title'
                    },
                    {
                        data: 'seeking_role',
                        name: 'seeking_role'
                    },
                    {
                        data: 'international_experience',
                        name: 'international_experience'
                    },
                    {
                        data: 'cv',
                        name: 'cv',
                        orderable: false,
                        render: function(data, type, row) {
                            if (data) {
                                return `<a href="/storage/${data}" target="_blank" class="btn btn-sm btn-info">View CV</a>`;
                            } else {
                                return '<span class="text-muted">No CV</span>';
                            }
                        }
                    },

                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        render: function(data, type, row) {
                            let messageBtn = '';
                            // if (row.message_id) {
                            //     messageBtn = `<a href="#" onclick="checkEmail('${row.message_id}')" class="btn btn-sm btn-soft-primary">
                            //                                 check Email Delivery
                            //                             </a>`;
                            // }

                            return `<ul class="list-unstyled hstack gap-1 mb-0">
                                                     <a href="#" onclick="deleteApplication(event,${data})" class="btn btn-sm btn-soft-danger">
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
                                        $(".applicationIds:enabled").prop('checked',
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
</script>
