<!--   <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2-pre
    </div>
  </footer> -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
</a>
</div>
<!-- ./wrapper -->

<!-- <script src="<?= base_url(); ?>/theme/admin/assets/js_terbilang/jquery-1.11.2.min.js"></script>
  <script src="<?= base_url(); ?>/theme/admin/assets/js_terbilang/jquery.mask.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>/theme/admin/assets/dist/js/jquery-3.5.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="<?= base_url(); ?>/theme/admin/assets/js_terbilang/terbilang.js"></script> -->





<script type="text/javascript">
    function inputTerbilang() {
        //membuat inputan otomatis jadi mata uang
        $('.mata-uang').mask('0.000.000.000', {
            reverse: true
        });

        //mengambil data uang yang akan dirubah jadi terbilang
        var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

        //menampilkan hasil dari terbilang
        document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
    }
</script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- jQuery -->
<!-- <script src="http://103.135.180.16/sptpdku_ci4/theme/admin/assets/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="http://103.135.180.16/sptpdku_ci4/theme/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/theme/admin/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>/theme/admin/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>/theme/admin/assets/dist/js/demo.js"></script>
<!-- DataTables -->
<!-- <script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables/jquery.dataTables.js"></script> -->
<!-- <script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/inputmask/jquery.inputmask.min.js"></script>


<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        $("#example1").DataTable({
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true,
        });
        $('#example3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        //Date picker2
        $('#reservationdate2').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>

<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const fotoLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        fotoLabel.textContent = foto.files[0].name;

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
</body>

</html>