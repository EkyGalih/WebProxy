<!DOCTYPE html>
<html>
<head>
	<title>Change Success</title>
	<meta http-equiv="Refresh" content="0;URL=web_proxy_access.php">

</head>
<body>
	<?php
	include "koneksi.php";
	$opr = $_GET['opr'];
	$id  = $_GET['id'];

	if ($opr == 'true') {	
		$e->write('/ip/proxy/access/enable', false);
		$e->write('=.id='.$id);
	}else{
		$e->write('/ip/proxy/access/disable', false);
		$e->write('=.id='.$id);
	}
	$e->read();
	?>
</body>
</html>