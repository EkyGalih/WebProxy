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
                    <h1 class="page-header">Web Proxy Access</h1>
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
                    <h4>Web Proxy Access</h4>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form method="POST" action="prosess_proxy_access.php">
                            <div class="form-group">
                                <label>Dst. Host</label>
                                <input type="text" name="dst_host" class="form-control" placeholder="Alamat Web" autofocus>
                            </div>
                            <div class="form-group">
                                <label>Action</label>
                                <select name="action" class="form-control">
                                    <option>--Pilih--</option>
                                    <option value="allow">allow</option>
                                    <option value="deny">deny</option>
                                </select>
                            </div>
                            <div id="accordion">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Tambah alamat sumber</a>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="form-group">
                                        <label>Src.Address</label>
                                        <input type="text" name="src_address" value="0.0.0.0" class="form-control" placeholder="Ip Sumber">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Disabled</label>
                                <input type="radio" name="disabled" value="yes"> Yes
                                <input type="radio" name="disabled" value="no"> No
                            </div>
                            <button type="submit" name="tambah" class="btn btn-success btn-sm">
                                <i class="fa fa-plus fa-fw"></i> Tambah
                            </button>
                            <button type="reset" class="btn btn-warning btn-sm">
                                <i class="fa fa-refresh fa-fw"></i> Refresh
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <br/>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Src.Address</th>
                                        <th>Dst.Host</th>
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $e->write("/ip/proxy/access/getall");
                                $access = $e->read();
                                
                                foreach ($access as $acc) {
                                  ?>
                                  <tbody>
                                    <tr>
                                        <td align="center"><?php echo $acc['.id'] ?></td>
                                        <td><?php
                                        if ($acc['src-address'] == NULL) {
                                            echo "-";
                                        }else{
                                            echo $acc['src-address'];
                                        }
                                        ?></td>
                                        <td><?php echo $acc['dst-host'] ?></td>
                                        <td align="center">
                                            <?php
                                            if ($acc['action'] == 'true') {
                                                echo "Allow";
                                            }else{
                                                echo "Deny";
                                            }
                                            ?>
                                            </td>
                                        <td align="center">
                                           <?php
                                           if ($acc['disabled'] == 'false') {
                                            echo '<a class="btn btn-success btn-sm" href="StatusProxyAccess.php?opr=false&id='.$acc['.id'].'"><i class="fa fa-check"></i> | Enabled</a>';
                                        }elseif ($acc['disabled'] == 'true') {
                                         echo '<a class="btn btn-warning btn-sm" href="StatusProxyAccess.php?opr=true&id='.$acc['.id'].'"><i class="fa fa-times"></i> | Disabled</a>';
                                     }
                                     ?>
                                 </td>
                                 <td align="center">
                                     <a href="HapusProxyAccess.php?id=<?php echo $acc['.id'] ?>" onclick="return confirm('Data akan dihapus! Lanjutkan?');" class="btn btn-danger btn-circle">
                                         <i class="fa fa-minus fa-fw"></i>
                                     </a>  <a href="UbahProxyAccess.php?id=<?php echo $acc['.id'] ?>" class="btn btn-warning btn-circle">
                                         <i class="fa fa-pencil fa-fw"></i>
                                     </a>
                                 </td>
                             </tr>
                         </tbody>
                         <?php
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