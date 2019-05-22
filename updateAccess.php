<?php
$id     = $_POST['id'];
$dst    = $_POST['dst_host'];
$act    = $_POST['action'];
$src    = $_POST['src_address'];
$dis    = $_POST['disabled'];
include "koneksi.php";
$e->write("/ip/proxy/access/set", false);
$e->write("=dst-host=$dst", false);
$e->write("=action=$act", false);
$e->write("=src-address=$src", false);
$e->write("=disabled=$dis", false);
$e->write("=.id=".$id);
$e->read();
echo "<script language='JavaScript'>
document.location = 'web_proxy_access.php';
</script>";
?>