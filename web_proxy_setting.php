<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Proxy - Proxy</title>
    <?php include "koneksi.php" ?>
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
                    <h1 class="page-header">Web Proxy Setting</h1>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome <b><?php echo $_SESSION['username'] ?> </b>, kamu login dari alamat <b><?php echo $_SESSION['hostname'] ?></b>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Web Proxy</h4>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                    <table class="table table-hover table-striped">
                        <?php
                        $e->write("/ip/proxy/getall");
                        $proxy = $e->read();
                        foreach ($proxy as $p) {
                            $enabled = $p['enabled'];
                            $address = $p['src-address'];
                            $port = $p['port'];
                            $pp = $p['parent-proxy'];
                            $ppp = $p['parent-proxy-port'];
                            $cache = $p['cache-administrator'];
                            $mcs = $p['max-cache-size'];
                            $cod = $p['cache-on-disk'];
                            $mcc = $p['max-client-connections'];
                            $msc = $p['max-server-connections'];
                            $mft = $p['max-fresh-time'];
                            $sc = $p['serialize-connections'];
                            $afc = $p['always-from-cache'];
                            $chd = $p['cache-hit-dscp'];
                            $cp = $p['cache-drive'];
                        }
                        ?>
                        <tr>
                            <td>Enabled</td>
                            <td>:</td>
                            <td>
                                <?php
                                if ($enabled == 'false') {
                                    echo '<a class="btn btn-success btn-sm" href="StatusProxy.php?opr=false"><i class="fa fa-check"></i> | Enabled</a>';
                                }elseif ($enabled == 'true') {
                                     echo '<a class="btn btn-warning btn-sm" href="StatusProxy.php?opr=true"><i class="fa fa-times"></i> | Disabled</a>';
                                }
                                ?>    
                            </td>
                        </tr>
                            <td>src-address</td>
                            <td>:</td>
                            <td><?php echo $address; ?></td>
                        </tr>
                            <td>port</td>
                            <td>:</td>
                            <td><?php echo $port; ?></td>
                        </tr>
                            <td>parent-proxy</td>
                            <td>:</td>
                            <td><?php echo $pp; ?></td>
                        </tr>
                            <td>parent-proxy-port</td>
                            <td>:</td>
                            <td><?php echo $ppp; ?></td>
                        </tr>
                            <td>cache-administrator</td>
                            <td>:</td>
                            <td><?php echo $cache; ?></td>
                        </tr>
                            <td>max-cache-size</td>
                            <td>:</td>
                            <td><?php echo $mcs; ?></td>
                        </tr>
                            <td>cache-on-disk</td>
                            <td>:</td>
                            <td><?php
                            if ($cod == "true") {
                                echo "Yes";
                            }else{
                                echo "No";
                            }
                            ?></td>
                        </tr>
                            <td>max-client-connection</td>
                            <td>:</td>
                            <td><?php echo $mcc; ?></td>
                        </tr>
                            <td>max-server-connection</td>
                            <td>:</td>
                            <td><?php echo $msc; ?></td>
                        </tr>
                            <td>max-fresh-time</td>
                            <td>:</td>
                            <td><?php echo $mft; ?></td>
                        </tr>
                            <td>serialize-connecions</td>
                            <td>:</td>
                            <td><?php
                            if ($sc == "true") {
                                echo "Yes";
                            }else{
                                echo "No";
                            }
                            ?></td>
                        </tr>
                            <td>always-from-cache</td>
                            <td>:</td>
                            <td><?php
                            if ($afc == "true") {
                                echo "Yes";
                            }else{
                                echo "No";
                            }
                            ?></td>
                        </tr>
                            <td>cache-hit-dscp</td>
                            <td>:</td>
                            <td><?php echo $chd; ?></td>
                        </tr>
                            <td>cache-drive</td>
                            <td>:</td>
                            <td><?php echo $cp; ?></td>
                        </tr>
                    </table>
                    <a href="edit_proxy_setting.php" class="btn btn-warning btn-block"><i class="fa fa-pencil"></i> Edit Proxy</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "js.php"; ?>
</body>
</html>