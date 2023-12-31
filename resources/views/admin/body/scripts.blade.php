
    <!-- Bootstrap JS -->
    <script src="{{asset('adminbackend')}}/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{asset('adminbackend')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/jquery-knob/excanvas.js"></script>
    <script src="{{asset('adminbackend')}}/assets/plugins/jquery-knob/jquery.knob.js"></script>
    <script>
        $(function () {
            $(".knob").knob();
        });
    </script>
    <script src="{{asset('adminbackend')}}/assets/js/index.js"></script>
    <!--app JS-->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
          } );
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );
         
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
    
    <script src="{{asset('adminbackend')}}/assets/js/app.js"></script>

    <script>
     @if(Session::has('message'))
     var type = "{{ Session::get('alert-type','info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
    
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
    
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
    
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
     }
     @endif 
    </script>
</body>

</html>






