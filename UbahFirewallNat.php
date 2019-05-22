<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Proxy - NAT</title>
    <?php include "koneksi.php" ?>
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php include "nav_top.php"; ?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include "nav_left.php"; ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Firewall NAT - Pengaturan</h1>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>Jonny Deen </b>
                        <i class="fa  fa-pencil"></i><b>&nbsp;2,000 </b>Support Tickets Pending to Answere. nbsp;
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Firewall Nat - Pengaturan</h4>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4 pull-left"></div>
                    <div class="col-sm-4">
                        <?php
                        $id = $_GET['id'];
                        $e->write('/ip/firewall/nat/print', false);
                        $e->write('=.proplist=.id', false);
                        $e->write('=.proplist=in-interface', false);
                        $e->write('=.proplist=chain', false);
                        $e->write('=.proplist=action', false);
                        $e->write('=.proplist=protocol', false);
                        $e->write('=.proplist=dst-port', false);
                        $e->write('=.proplist=to-ports', false);
                        $e->write('=.proplist=disabled', false);
                        $e->write('?.id='.$id);
                        $firewall = $e->read();
                        
                        foreach ($firewall as $f) {
                            $inf        = $f['in-interface'];
                            $chain      = $f['chain'];
                            $action     = $f['action'];
                            $proto      = $f['protocol'];
                            $dst        = $f['dst-port'];
                            $port       = $f['to-ports'];
                            $dis        = $f['disabled'];
                        }
                        ?>
                        <form class="role" method="POST" action="prosesUbahNat.php">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label>In-Interface</label>
                                <select name="in-interface" class="form-control">
                                  <option>--Pilih--</option>
                                  <option value="ether1" <?php if(isset($inf) && $inf == 'ether1') {echo "selected";} ?>>ether 1</option>
                                  <option value="ether2" <?php if(isset($inf) && $inf == 'ether2') {echo "selected";} ?>>ether 2</option>
                              </select>
                          </div>
                      <div class="form-group">
                        <label>Chain</label>
                        <select name="chain" class="form-control">
                            <option>Pilih</option>
                            <option value="srcnat" <?php if(isset($chain) && $chain == 'srcnat') {echo "selected";} ?>>srcnat</option>
                            <option value="dstnat" <?php if(isset($chain) && $chain == 'dstnat') {echo "selected";} ?>>dstnat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Aksi</label>
                        <select name="action" class="form-control">
                            <option>Pilih</option>
                            <option value="accept" <?php if(isset($action) && $action == 'accept') {echo "selected";} ?>>Accept</option>
                            <option value="add-dst-to-address-list" <?php if(isset($action) && $action == 'add-dst-to-address-list') {echo "selected";} ?>>add-dst-to-address-list</option>
                            <option value="add-src-to-address-list" <?php if(isset($action) && $action == 'add-src-to-address-list') {echo "selected";} ?>>add-src-to-address-list</option>
                            <option value="dst-nat" <?php if(isset($action) && $action == 'dst-nat') {echo "selected";} ?>>dst-nat</option>
                            <option value="jump" <?php if(isset($action) && $action == 'jump') {echo "selected";} ?>>jump</option>
                            <option value="log" <?php if(isset($action) && $action == 'log') {echo "selected";} ?>>log</option>
                            <option value="masquerade" <?php if(isset($action) && $action == 'masquerade') {echo "selected";} ?>>masquerade</option>
                            <option value="netmap" <?php if(isset($action) && $action == 'netmap') {echo "selected";} ?>>netmap</option>
                            <option value="passthrough" <?php if(isset($action) && $action == 'passthrough') {echo "selected";} ?>>passthrough</option>
                            <option value="redirect" <?php if(isset($action) && $action == 'redirect') {echo "selected";} ?>>redirect</option>
                            <option value="return" <?php if(isset($action) && $action == 'return') {echo "selected";} ?>>return</option>
                            <option value="same" <?php if(isset($action) && $action == 'same') {echo "selected";} ?>>same</option>
                            <option value="src-nat" <?php if(isset($action) && $action == 'src-nat') {echo "selected";} ?>>src-nat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Protocols</label>
                        <select name="protocols" class="form-control">
                            <option>--Pilih--</option>
                            <option value="icmp" <?php if(isset($proto) && $proto == 'icmp') {echo "selected";} ?>>icmp</option>
                            <option value="igmp" <?php if(isset($proto) && $proto == 'igmp') {echo "selected";} ?>>igmp</option>
                            <option value="ggp" <?php if(isset($proto) && $proto == 'ggp') {echo "selected";} ?>>ggp</option>
                            <option value="ip-encap" <?php if(isset($proto) && $proto == 'ip-encap') {echo "selected";} ?>>ip-encap</option>
                            <option value="st" <?php if(isset($proto) && $proto == 'st') {echo "selected";} ?>st</option>
                            <option value="tcp" <?php if(isset($proto) && $proto == 'tcp') {echo "selected";} ?>>tcp</option>
                            <option value="egp" <?php if(isset($proto) && $proto == 'egp') {echo "selected";} ?>>egp</option>
                            <option value="pup" <?php if(isset($proto) && $proto == 'pup') {echo "selected";} ?>>pup</option>
                            <option value="udp" <?php if(isset($proto) && $proto == 'udp') {echo "selected";} ?>>udp</option>
                            <option value="hmp" <?php if(isset($proto) && $proto == 'hmp') {echo "selected";} ?>>hmp</option>
                            <option value="xns-idp" <?php if(isset($proto) && $proto == 'xns-idp') {echo "selected";} ?>>xns-idp</option>
                            <option value="rdp" <?php if(isset($proto) && $proto == 'rdp') {echo "selected";} ?>>rdp</option>
                            <option value="iso-tp4" <?php if(isset($proto) && $proto == 'iso-tp4') {echo "selected";} ?>>iso-tp4</option>
                            <option value="xtp" <?php if(isset($proto) && $proto == 'xtp') {echo "selected";} ?>>xtp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>dst-port</label>
                        <input type="text" name="dst-port" value="<?php echo $dst ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>to-ports</label>
                        <input type="text" name="to-ports" value="<?php echo $port ?>" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil fa-fw"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-warning btn-sm">
                        <i class="fa fa-refresh fa-fw"></i> Refresh
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php include "js.php"; ?>
</body>
</html>