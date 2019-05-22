<?php
if (isset($_POST['tambah'])) {
	$src 	= $_POST['src_address'];
	$web 	= $_POST['dst_host'];
	$act 	= $_POST['action'];
	$status	= $_POST['disabled'];

	include "koneksi.php";

	$e->write('/ip/proxy/access/add', false);
	$e->write('=src-address='.$src, false);
	$e->write('=dst-host='.$web, false);
	$e->write('=action='.$act, false);
	$e->write('=disabled='.$status);
	$e->read();
	?>
	<script language='JavaScript'>
		document.location = 'web_proxy_access.php';
	</script>
	<?php
}
?>