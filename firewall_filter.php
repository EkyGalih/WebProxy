<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Proxy - Tambah</title>
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
                    <h1 class="page-header">Firewall Filter</h1>
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
                    <h4>Firewall Filter</h4>
                </div>
                <div class="panel-body">
                    <form class="role" method="POST" action="proses_filter.php">
                        <div class="col-sm-5 pull-left">
                            <div class="form-group">
                                <label>Src. Address</label>
                                <input type="text" name="src_address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Chain</label>
                                <select name="chain" class="form-control">
                                    <option>Pilih</option>
                                    <option value="forward">Forward</option>
                                    <option value="input">Input</option>
                                    <option value="output">Output</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Aksi</label>
                                <select name="action" class="form-control">
                                    <option>Pilih</option>
                                    <option value="drop">Drop</option>
                                    <option value="reject">Reject</option>
                                    <option value="accept">Accept</option>
                                </select>
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
                                    <th>Src. Address</th>
                                    <th>Dst. Address</th>
                                    <th>Disabled</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $e->write('/ip/firewall/filter/getall');
                            $filter = $e->read();
                            $no = 1; foreach ($filter as $f) {
                                ?>
                                <tbody>
                                    <td align="center"><?php echo $no ?></td>
                                    <td align="center"><?php echo $f['chain'] ?></td>
                                    <td align="center"><?php echo $f['action'] ?></td>
                                    <td><?php echo $f['src-address'] ?></td>
                                    <td><?php echo $f['dst-address'] ?></td>
                                    <td align="center"><?php echo $f['disabled'] ?></td>
                                    <td>
                                        ubah | hapus
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