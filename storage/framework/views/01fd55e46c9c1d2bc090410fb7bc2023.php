<script>
    var datatable;

    function dataTable() {
        $(function() {
            datatable = $('#commentTable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                responsive: false,
                destroy: true,
                searching: true,
                ajax: {
                    url: '<?php echo e(route('get.blog.comment')); ?>',
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
                            return `<input type="checkbox" style='text-align: center;width:48px;height:15px;' class="commentIds" value="${data}"/> `;
                        }
                    },
                    {
                        data: 'blog_title',
                        name: 'blog_title'
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
                            return `<ul class="list-unstyled hstack gap-1 mb-0">
                                                     <a href="#" onclick="deleteBlogComment(event,${data})" class="btn btn-sm btn-soft-danger"><i
                                                        class="mdi mdi-delete-outline"></i></a>
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
                                        $(".commentIds:enabled").prop('checked',
                                            'true');
                                    } else {
                                        $('.commentIds').prop('checked', false)
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
<?php /**PATH /Users/jal/Herd/bookmark/resources/views/admin/blog/js/datatable.blade.php ENDPATH**/ ?>