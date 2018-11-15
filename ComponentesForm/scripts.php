    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot pluins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date-es-ES.js"></script>
    <!-- JQVMap -->
    <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
    
    <!-- jquery.inputmask -->
    <script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="../../vendors/sweetalert2-7.26.12/archivitos/sweetalert2.min.js"></script>


    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../../vendors/pdfmake/build/vfs_fonts.js"></script>   
    
    <!-- PNotify3 -->
    <script src="../../vendors/notifit-2-master/dist/notifit.min.js"></script>
    
    <!-- Select2 --->
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    
    <!-- JQuery Form -->
    <script src="../../vendors/jquery_form/dist/jquery.form.min.js"></script>
    
    <!-- iziModal-->
    <script src="../../vendors/iziModal-master/js/iziModal.min.js"></script>

    <!-- include alertify script -->
    
    <script src="../../alertas/build/alertify.js"></script>
    <script src="../../alertas/build/alertify.min.js"></script>

<!-- DateExporter -->
<script src="../../vendors/tableExport.jquery/tableExport.js"></script>
<script src="../../vendors/tableExport.jquery/jquery.base64.js"></script>
<script src="../../vendors/tableExport.jquery/jspdf/libs/sprintf.js"></script>
<script src="../../vendors/tableExport.jquery/jspdf/jspdf.js"></script>
<script src="../../vendors/tableExport.jquery/jspdf/libs/base64.js"></script>

<!-- Boostrap Notify -->
<script src="../../vendors/bootstrap-notify-master/bootstrap-notify.min.js"></script>
<!-- Initialize datetimepicker -->
    <script>
        
        $(document).ready(function() {
            // obtenemos la fecha actual - años para el minimo aceptado
            var date = new Date();
            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear()-70; 
            var date2 = new Date();
            var m2 = date2.getMonth(), d2 = date2.getDate(), y2 = date2.getFullYear()-18;
            $('#myDatepicker2').datetimepicker({

                format: 'DD/MM/YYYY',
                allowInputToggle: true,
                minDate: new Date(y, m, d),
                maxDate: new Date(y2, m2, d2)

            });

        });

        $(document).ready(function() {
            // obtenemos la fecha actual - años para el minimo aceptado
            var date = new Date();
            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear()-70;
            var date2 = new Date();
            var m2 = date2.getMonth(), d2 = date2.getDate(), y2 = date2.getFullYear()-1;
            $('#myDatepicker3').datetimepicker({

                format: 'DD/MM/YYYY',
                allowInputToggle: true,
                minDate: new Date(y, m, d),
                maxDate: new Date(y2, m2, d2)

            });

        });
        
        $(document).ready(function() {
            // obtenemos la fecha actual - años para el minimo aceptado
            var date = new Date();
            var m = date.getMonth()-1, d = date.getDate(), y = date.getFullYear(); 
            var date2 = new Date();
            var m2 = date2.getMonth(), d2 = date2.getDate(), y2 = date2.getFullYear();
            $('#myDatepicker1').datetimepicker({
                format: 'DD/MM/YYYY',
                allowInputToggle: true,
                minDate: new Date(y, m, d),
                maxDate: new Date(y2, m2, d2)
            });

        });

        $('#daterange-btn').daterangepicker({
            ranges   : {
              'Hoy'       : [moment(), moment()],
              'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Ultimos 7 Dias' : [moment().subtract(6, 'days'), moment()],
              'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
              'Ultimo Mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
              'Ultimo Año'  : [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
              'Este Año'  : [moment().startOf('year'), moment().endOf('year')],
              'Desde Siempre'  : [moment().subtract(3, 'year').startOf('year'), moment().endOf('year')],
            },
            startDate: moment(),
            endDate  : moment(),
            maxDate: moment()
        },
        
        function (start, end) {
            $("#rango3").val(start.format('DD/MM/YYYY')),
            $("#rango4").val(end.format('DD/MM/YYYY')),
            $('#daterange-btn ')
            
        })

        $('#daterange-btn2').daterangepicker({
            ranges   : {
              'Hoy'       : [moment(), moment()],
              'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Ultimos 7 Dias' : [moment().subtract(6, 'days'), moment()],
              'Este Mes'  : [moment().startOf('month'), moment().endOf('month')],
              'Ultimo Mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
              'Ultimo Año'  : [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
              'Este Año'  : [moment().startOf('year'), moment().endOf('year')],
              'Desde Siempre'  : [moment().subtract(3, 'year').startOf('year'), moment().endOf('year')],
            },
            startDate: moment(),
            endDate  : moment(),
            maxDate: moment()
        },
        
        function (start, end) {
            $("#rango1").val(start.format('DD/MM/YYYY')),
            $("#rango2").val(end.format('DD/MM/YYYY')),
            $('#daterange-btn2 ')
            
        })

        
   /* $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker0').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });*/
</script>