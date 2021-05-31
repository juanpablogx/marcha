	<script>
		const URL_BASE = 'http://localhost/marcha/public/';
	</script>
	<!-- jQuery -->
	<script src="<?php echo base_url();?>/dist/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url();?>/dist/plugins/jquery-ui/jquery-ui.min.js"></script>  
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url();?>/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url();?>/dist/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url();?>/dist/plugins/moment/moment.min.js"></script>
	<script src="<?php echo base_url();?>/dist/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?php echo base_url();?>/dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url();?>/dist/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url();?>/dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url();?>/dist/js/adminlte.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url();?>/dist/js/demo.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- 	<script src="<?php //echo base_url();?>/dist/js/pages/dashboard.js"></script> -->

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script src="<?php if(isset($archivo_js)) {echo base_url().'/dist/js/'.$archivo_js;}?>"></script>
</body>
</html>