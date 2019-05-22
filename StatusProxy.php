<!DOCTYPE html>
<html>
<head>
	<title>Change Success</title>
	<meta http-equiv="Refresh" content="0;URL=web_proxy_setting.php">

</head>
<body>
	<?php
	include "koneksi.php";
	$opr = $_GET['opr'];

	if ($opr == 'true') {	
		$e->write('/ip/proxy/set', false);
		$e->write('=enabled='. "no");
	}else{
		$e->write('/ip/proxy/set', false);
		$e->write('=enabled='."yes");
	}
	$e->read();
	?>
</body>
</html>