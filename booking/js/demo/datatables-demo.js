// Call the dataTables jQuery plugin
$(document).ready(function() {
      $('#dataTable').DataTable( {
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );

       
    } );
   