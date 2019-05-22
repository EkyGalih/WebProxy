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
                    <h1 class="page-header">Firewall NAT</h1>
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
                    <h4>Firewall Nat</h4>
                </div>
                <div class="panel-body">
                    <form class="role" method="POST" action="proses_nat.php">
                        <div class="col-sm-5 pull-left">
                            <div class="form-group">
                                <label>In-Interface</label>
                              <select name="in-interface" class="form-control">
                                  <option>--Pilih--</option>
                                  <option value="ether1">ether 1</option>
                                  <option value="ether2">ether 2</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Out-Interface</label>
                               <select name="out-interface" class="form-control">
                                  <option>--Pilih--</option>
                                  <option value="ether1">ether 1</option>
                                  <option value="ether2">ether 2</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Chain</label>
                                <select name="chain" class="form-control">
                                    <option>Pilih</option>
                                    <option value="forward">Forward</option>
                                    <option value="input">Input</option>
                                    <option value="output">Output</option>
                                    <option value="postrouting">Post-Routing</option>
                                    <option value="prerouting">Pre-Routing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Aksi</label>
                                <select name="action" class="form-control">
                                    <option>Pilih</option>
                                    <option value="accept">Accept</option>
                                    <option value="add-dst-to-address-list">add-dst-to-address-list</option>
                                    <option value="add-src-to-address-list">add-src-to-address-list</option>
                                    <option value="dst-nat">dst-nat</option>
                                    <option value="jump">jump</option>
                                    <option value="log">log</option>
                                    <option value="masquerade">masquerade</option>
                                    <option value="netmap">netmap</option>
                                    <option value="passthrough">passthrough</option>
                                    <option value="redirect">redirect</option>
                                    <option value="return">return</option>
                                    <option value="same">same</option>
                                    <option value="src-nat">src-nat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Protocols</label>
                                <select name="protocols" class="form-control">
                                    <option>--Pilih--</option>
                                    <option value="icmp">icmp</option>
                                    <option value="igmp">igmp</option>
                                    <option value="ggp">ggp</option>
                                    <option value="ip-encap">ip-encap</option>
                                    <option value="st">st</option>
                                    <option value="tcp">tcp</option>
                                    <option value="egp">egp</option>
                                    <option value="pup">pup</option>
                                    <option value="udp">udp</option>
                                    <option value="hmp">hmp</option>
                                    <option value="xns-idp">xns-idp</option>
                                    <option value="rdp">rdp</option>
                                    <option value="iso-tp4">iso-tp4</option>
                                    <option value="xtp">xtp</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>dst-port</label>
                                <input type="text" name="dst-port" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>to-ports</label>
                                <input type="text" name="to-ports" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Disabled? :</label>
                                <div class="radio-inline">
                                    <input type="radio" name="disabled" value="yes"> Yes
                                </div>
                                <div class="radio-inline">
                                    <input type="radio" name="disabled" value="no"> No
                                </div>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil fa-fw"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-warning btn-sm">
                                <i class="fa fa-refresh fa-fw"></i> Refresh
                            </button>
                        </div>
                    </form>
                    <div class="col-sm-7 pull-right">
                       <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="web_proxy">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Chain</th>
                                    <th>Disabled</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $e->write('/ip/firewall/nat/getall');
                            $mangle = $e->read();
                            $no = 1; foreach ($mangle as $m) {
                                ?>
                                <tbody>
                                    <td align="center"><?php echo $m['.id'] ?></td>
                                    <td align="center"><?php echo $m['action'] ?></td>
                                    <td align="center"><?php echo $m['chain'] ?></td>
                                    <td align="center">
                                        <?php
                                        if ($m['disabled'] == 'false') {
                                            echo '<a class="btn btn-success btn-sm" href="StatusFirewallNat.php?opr=false&id='.$m['.id'].'"><i class="fa fa-check"></i> | Enabled</a>';
                                        }else{
                                            echo '<a class="btn btn-warning btn-sm" href="StatusFirewallNat.php?opr=true&id='.$m['.id'].'"><i class="fa fa-times"></i> | Disabled</a>';
                                        }
                                        ?>
                                        </td>
                                    <td align="center">
                                        <a href="UbahFirewallNat.php?id=<?php echo $m['.id'] ?>" class="btn btn-warning btn-circle">
                                         <i class="fa fa-pencil fa-fw"></i>
                                     </a>  <a href="HapusFirewallNat.php?id=<?php echo $m['.id'] ?>" onclick="return confirm('Data akan dihapus! Lanjutkan?');" class="btn btn-danger btn-circle">
                                         <i class="fa fa-minus fa-fw"></i>
                                     </a> <a href="#" class="btn btn-primary btn-circle">
                                         <i class="fa fa-eye fa-fw"></i>
                                     </a>
                                    </td>
                                </tbody>
                                <?php
                                $no++;
                            }
                            ?>
                        </table>
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