<?php
	//cek if button submit klik
if (isset($_POST['save'])) {
		//mengambil inputan
	$chain = $_POST['chain'];
	$action = $_POST['action'];
	$address = $_POST['src_address'];
	// $list	 = $_POST['address-list'];
	$disabled = $_POST['disabled'];
		//include file connect.php
	include "koneksi.php";
		//read synatx MikroTik
	$e->write('/ip/firewall/filter/add', false);
	$e->write('=chain='.$chain, false);
	$e->write('=action='.$action, false);
	$e->write('=src-address='.$address, false);
	// $e->write('=address-list='.$list, false);
	$e->write('=disabled='.$disabled);
			//read excute syntax MikroTik
	$e->read();
		//show message after excute syntax MikroTik
	?>
	 <script language='JavaScript'>
        alert('Add Firewall Success!!');
        document.location = 'firewall_filter.php';
    </script>
	<?php
}
?>