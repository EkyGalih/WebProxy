<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Proxy - Edit</title>
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
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>Jonny Deen </b>
                        <i class="fa fa-pencil"></i><b>&nbsp;2,000 </b>Support Tickets Pending to Answere. nbsp;
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit Proxy</h4>
                </div>
                <div class="panel-body">
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
                    <form class="role" method="POST" action="tambah_proxy.php">
                        <div class="col-sm-6 pull-left">
                            <div class="form-group">
                                <label>Src. Address</label>
                                <input type="text" name="src_address" value="<?php echo $address ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Port</label>
                                <input type="text" name="port" value="<?php echo $port ?>" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label>Parent Proxy</label>
                                <input type="text" name="parent_proxy" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Parent Proxy Port</label>
                                <input type="text" name="parent_proxy_port" class="form-control">
                            </div> -->
                            <div class="form-group">
                                <label>Cache Administrator</label>
                                <input type="text" name="cache_admin"  value="<?php echo $cache ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Max. Cache Size</label>
                                <input type="text" name="max_cache" value="<?php echo $mcs ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Max. Client Connection</label>
                                <input type="text" name="max_client" value="<?php echo $mcc ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 pull-right">
                            <div class="form-group">
                                <label>Max. Server Connection</label>
                                <input type="text" name="max_server" value="<?php echo $msc ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Serialize Connections</label>
                                <div class="radio-inline">
                                    <input type="radio" name="serialize-connections" value="yes" <?php if(isset($sc) && $sc == 'true') echo "checked"; ?>> Yes
                                </div>
                                <div class="radio-inline">
                                    <input type="radio" name="serialize-connections" value="no" <?php if(isset($sc) && $sc == 'false') echo "checked"; ?>> No
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Always From Cache</label>
                                <div class="radio-inline">
                                    <input type="radio" name="always-from-cache" value="yes" <?php if(isset($afc) && $afc == 'true') echo "checked"; ?>> Yes
                                </div>
                                <div class="radio-inline">
                                    <input type="radio" name="always-from-cache" value="no" <?php if(isset($afc) && $afc == 'false') echo "checked"; ?>> No
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Cache on disk</label>
                                <div class="radio-inline">
                                    <input type="radio" name="cache-on-disk" value="yes" <?php if(isset($cod) && $cod == 'true') echo "checked"; ?>> Yes
                                </div>
                                <div class="radio-inline">
                                    <input type="radio" name="cache-on-disk" value="no" <?php if(isset($cod) && $cod == 'false') echo "checked"; ?>> No
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Cache Hit DSCP (TOS)</label>
                                <input type="text" name="cache_hit" value="<?php echo $chd ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Cache Drive</label>
                               <input type="text" class="form-control" value="<?php echo $cp ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Disabled :</label>
                                <div class="radio-inline">
                                    <input type="radio" name="disabled" value="yes" <?php if(isset($enabled) && $enabled == 'false') echo "checked"; ?>> Yes
                                </div>
                                <div class="radio-inline">
                                    <input type="radio" name="disabled" value="no" <?php if(isset($enabled) && $enabled == 'true') echo "checked"; ?>> No
                                </div>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil fa-fw"></i> Simpan
                            </button>
                            <button type="submit" name="direct" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil fa-fw"></i> Direct
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "js.php"; ?>
</body>
</html>