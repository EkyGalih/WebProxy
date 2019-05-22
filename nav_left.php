<?php
//mengekseksui perintah mikrotik untuk menampilkan user
$e->write('/user/getall');
//membaca hasil eksekusi dan menampungnya kedalam variabel $user
$user = $e->read();
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section">
                    <div class="user-section-inner">
                        <img src="assets/img/user.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <div><strong><?php echo $_SESSION['username'] ?></strong> - <br/><?php echo $_SESSION['hostname'] ?></div>
                        <div class="user-text-online">
                            <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                        </div>
                    </div>
                </div>
                <!--end user image section-->
            </li>
            <li class="sidebar-search">
                <!-- search section-->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!--end search section-->
            </li>
            <li class="selected">
                <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cloud fa-fw"></i>Web Proxy<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="web_proxy_setting.php"><i class="fa fa-wrench fa-fw"></i>Setting Proxy</a>
                    </li>
                    <li>
                        <a href="web_proxy_access.php"><i class="fa fa-ban fa-fw"></i> Access</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i>Firewall<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                   <!--  <li>
                        <a href="firewall_mangle.php">Mangel</a>
                    </li> -->
                    <li>
                        <a href="firewall_nat.php">NAT</a>
                    </li>
                    <!-- <li>
                        <a href="firewall_filter.php">Filter</a>
                    </li> -->
                </ul>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-info fa-fw"></i>Help</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-edit fa-fw"></i>About Aplication</a>
            </li>
        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>