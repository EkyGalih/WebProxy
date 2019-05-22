<?php
// var_dump($_POST);
if (isset($_POST['save'])) {
	//ambil inputan dari form yang tersimpan di variabel $_POST
	$address		= $_POST['src_address'];
	$port 			= $_POST['port'];
	// $parent_proxy 	= $_POST['parent_port'];
	// $parent_pproxy 	= $_POST['parent_proxy_port'];
	$cacheAD		= $_POST['cache_admin'];
	$max_cache 		= $_POST['max_cache'];
	$max_client 	= $_POST['max_client'];
	$max_server 	= $_POST['max_server'];
	$sc 			= $_POST['serialize-connections'];
	$AFC			= $_POST['always-from-cache'];
	$cache_disk 	= $_POST['cache-on-disk'];
	$tos 			= $_POST['cache_hit'];
	$enabled 		= $_POST['disabled'];

include "koneksi.php";

//eksekusi perintah mikrotik untuk memasukkan data yang ditampung pada masing2 variabel
	$e->write('/ip/proxy/set', false);
	$e->write('=src-address='.$address, false);
	$e->write('=port='.$port, false);
	// $e->write('=parent-proxy='.$parent_proxy, false);
	// $e->write('=parent-proxy-port=',$parent_pproxy);
	$e->write('=cache-administrator='.$cacheAD, false);
	$e->write('=max-cache-size='.$max_cache, false);
	$e->write('=max-client-connections='.$max_client, false);
	$e->write('=max-server-connections='.$max_server, false);
	$e->write('=serialize-connections='.$sc, false);
	$e->write('=always-from-cache='.$AFC, false);
	$e->write('=cache-on-disk='.$cache_disk, false);
	$e->write('=cache-hit-dscp='.$tos, false);
	$e->write('=enabled='.$enabled);

	//membaca dan menyimpan data ke mikrotik
	$e->read();
	?>
	<script language='JavaScript'>
	alert('Tambah Proxy berhasil!');
	document.location = 'web_proxy_setting.php';
	</script>
	<?php
}
?>