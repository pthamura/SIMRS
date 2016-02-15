        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>SIMRS</b> Version 0.0.1
            </div>
            <strong>&copy; <?php echo date('Y');?></strong>
            Rumah Sakit Umum Daerah Serui | All Rights Reserved.
        </footer>
        <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
        <script>
            // datatable
            $(document).ready(function() {
                $('#datatable').DataTable({
                    "language": {
                        "url": "<?php echo base_url('assets/plugins/datatables/Indonesian.json');?>"
                    },
                });
            } );
        </script>
        <script>
            // tooltip
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $(".select2").select2();
                $(".textarea").wysihtml5();
            })
        </script>
        <script>
            // datepicker
            $(document).ready(function() {
                jQuery('#datetimepicker').datetimepicker({
                    timepicker:false,
                    format: 'Y-m-d'
                });
            } );
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".btnnorm").click(function () {
                    var x = $(this).prop("value");
                    var y = x.split(', ');
                    for(var i=0;i<1;i++){
                        $('#norm').val(y[0]);
                        $('#fullname').val(y[1]);
                        $('#place').val(y[2]);
                        $('#datetimepicker').val(y[3]);
                        $('#'+y[4]).prop("checked", true);
                        $('#jalan_1').val(y[5]);
                        $('#jalan_2').val(y[6]);
                        $('#kelurahan').val(y[7]);
                        $('#kecamatan').val(y[8]);
                        $('#kota').val(y[9]);
                        $('#id_pasien').val(y[10]);
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $('.multi-field-wrapper').each(function() {
                var $wrapper = $('.multi-fields', this);
                $("#tambahbaris", $(this)).click(function(e) {
                    $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('');
                });
            });
        </script>
    </body>
</html>