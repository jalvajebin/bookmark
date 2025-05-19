<script>
    $(document).ready(function () {
        $('#whyWorkWithProYajTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('whyworkwith.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
