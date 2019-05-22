<?php
$id 	= $_POST['id'];
$int 	= $_POST['in-interface'];
$chain	= $_POST['chain'];
$action = $_POST['action'];
$proto 	= $_POST['protocols'];
$dst 	= $_POST['dst-port'];
$toport = $_POST['to-ports'];
include "koneksi.php";
$e->write("/ip/firewall/nat/set", false);
$e->write("=in-interface=$int", false);
$e->write("=chain=$chain", false);
$e->write("=action=$action", false);
$e->write("=protocol=$proto", false);
$e->write("=dst-port=$dst", false);
$e->write("=to-ports=$toport", false);
$e->write("=.id=$id");
$e->read();
echo "<script language='JavaScript'>
document.location = 'firewall_nat.php';
</script>";
?>