<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Proxy - Proxy Access</title>
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
                    <h1 class="page-header">Web Proxy Access - Pengaturan</h1>
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
                    <h4>Web Proxy Access - Pengaturan</h4>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <?php
                            $id = $_GET['id'];
                            $e->write('/ip/proxy/access/print', false);
                            $e->write('=.proplist=.id', false);
                            $e->write('=.proplist=dst-host', false);
                            $e->write('=.proplist=action', false);
                            $e->write('=.proplist=src-address', false);
                            $e->write('=.proplist=disabled', false);
                            $e->write('?.id='.$id);
                            $access = $e->read();

                            foreach ($access as $acc)
                            {
                                $dst    = $acc['dst-host'];
                                $src    = $acc['src-address'];
                                $act    = $acc['action'];
                                $dis    = $acc['disabled'];
                            }
                        ?>
                        <form method="POST" action="updateAccess.php">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label>Dst. Host</label>
                                <input type="text" name="dst_host" value="<?php echo $dst ?>" class="form-control" placeholder="Alamat Web" autofocus>
                            </div>
                            <div class="form-group">
                                <label>Action</label>
                                <select name="action" class="form-control">
                                    <option>--Pilih--</option>
                                    <option value="allow" <?php if(isset($act) && $act == 'true') {echo "selected";} ?>>allow</option>
                                    <option value="deny" <?php if(isset($act) && $act == 'false') {echo "selected";} ?>>deny</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Src.Address</label>
                                <input type="text" name="src_address" value="<?php echo $src ?>" class="form-control" placeholder="Ip Sumber">
                            </div>
                            <div class="form-group">
                                <label>Disabled</label>
                                <input type="radio" name="disabled" value="yes" <?php if(isset($dis) && $dis == 'true') echo "checked"; ?>> Yes
                                <input type="radio" name="disabled" value="no" <?php if(isset($dis) && $dis == 'false') echo "checked"; ?>> No
                            </div>
                            <button type="submit" name="btnsimpan" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus fa-fw"></i> Simpan
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="history.back(-1)">
                                <i class="fa fa-times fa-fw"></i> Batal
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