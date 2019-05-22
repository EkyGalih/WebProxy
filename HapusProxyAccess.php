<?php
	//menyisipkan file connect.php
	include "koneksi.php";

	//mengambil nilai id dari querystring
	$id = $_GET['id'];

	//mengeksekusi perintah mikrotik
	$e->write('/ip/proxy/access/remove', false);
	$e->write('=.id='.$id);

	//membaca hasil eksekusi
	$e->read();

	//menampilkan pesan eksekusi
?>
	<script language='JavaScript'>
        document.location = 'web_proxy_access.php';
    </script>