$(document).ready(function(){

    $('#customer_data').DataTable({

        dom: 'lBfrtip',
        buttons: [
            'excel', 'csv', 'pdf', 'copy'
        ],
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });

});