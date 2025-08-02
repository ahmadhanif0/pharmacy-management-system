    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#datatable-export')) {
            $('#datatable-export').DataTable().destroy();
        }

        $('#datatable-export').DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'collection',
                text: 'Export Data',
                buttons: [
                    'pdf',
                    'excel',
                    'csv',
                    'print'
                ]
            }
        ],
            pageLength: 10,
            lengthChange: true
        });
    });
