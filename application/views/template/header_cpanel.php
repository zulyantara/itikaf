<?php defined('BASEPATH') OR exit('No direct script access allowed');

$user_image = $this->session->userdata('pesertaFoto') != "" ? $this->session->userdata('pesertaFoto') : "avatar.png";
$jml = $this->master_model->count_peserta_0();
$jml_daftar = $this->master_model->count_peserta_today();
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard --</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/font-awsome/css/font-awesome.min.css"); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/ionicons/css/ionicons.min.css"); ?>">
        <!-- datatables -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/datatables/dataTables.bootstrap.css"); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/AdminLTE.min.css"); ?>">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/skins/skin-green.min.css"); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="<?php echo base_url("assets/plugins/html5shiv.min.js"); ?>"></script>
            <script src="<?php echo base_url("assets/plugins/respond.min.js"); ?>"></script>
        <![endif]-->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url("assets/plugins/jQuery/jquery-3.1.1.min.js"); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
        <!-- datatables -->
        <script src="<?php echo base_url("assets/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo base_url("assets/plugins/raphael/raphael.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/morris/morris.min.js"); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url("assets/dist/js/app.min.js"); ?>"></script>

        <script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
    </head>

    <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.png"); ?>" />
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="<?php echo site_url("cpanels"); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Ahlan</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Ahlan</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><?php echo $jml+$jml_daftar; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <?php echo $jml+$jml_daftar; ?> notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li><a href="<?php echo site_url("cpanel_aktivasi"); ?>"><i class="fa fa-users text-aqua"></i> <?php echo $jml; ?> peserta tidak aktif</a></li>
                                        <li><a href="<?php echo site_url("cpanel_peserta_aktif"); ?>"><i class="fa fa-users text-aqua"></i> <?php echo $jml_daftar; ?> peserta baru hari ini</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="footer"><a href="#">View all</a></li> -->
                            </ul>
                        </li>

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?php echo base_url("upload/photo/".$user_image); ?>" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $this->session->userdata('userNama'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?php echo base_url("upload/photo/".$user_image); ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo ucwords($this->session->userdata('userNama')); ?>
                                        <small>Mendaftar Pada <?php echo $this->session->userdata('pesertaCreate'); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url("cpanel_profile"); ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url("auth/logout"); ?>" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">

                        <img src="<?php echo base_url("upload/photo/".$user_image); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo ucwords($this->session->userdata('userNama')); ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <!-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> -->
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">MENU UTAMA</li>
                    <?php
                    $ur_id = $this->session->userdata('userUr');
                    $sql_menu = 'SELECT DISTINCT ha_menu,ha_id,ha_ur,ha_view,ha_insert,ha_update,ha_delete,ha_proses,menu_id,menu_ket,menu_parent,menu_url,menu_order FROM hak_akses LEFT JOIN menu ON ha_menu=menu_id WHERE menu_parent=0 AND ha_ur='.$ur_id.' AND ha_view=1 ORDER BY menu_order ASC';
                    $qry_menu = $this->db->query($sql_menu);
                    $res_menu = $qry_menu->num_rows() > 0 ? $qry_menu->result() : FALSE;
                    // var_dump($res_menu);

                    if ($res_menu !== FALSE)
                    {
                        foreach ($res_menu as $val_menu)
                        {
                            $menu_url = $val_menu->menu_url === 'home' ? '' : $val_menu->menu_url;

                            $sql_sub_menu = 'SELECT DISTINCT menu_id, menu_ket, menu_url, menu_order FROM hak_akses LEFT JOIN menu ON ha_menu=menu_id WHERE menu_parent='.$val_menu->menu_id.' AND ha_view=1 AND ha_ur='.$ur_id.' GROUP BY menu_id, menu_ket, menu_url, menu_order ORDER BY menu_order ASC';
                            // echo $sql_sub_menu;
                            $qry_sub_menu = $this->db->query($sql_sub_menu);
                            $res_sub_menu = $qry_sub_menu->num_rows() > 0 ? $qry_sub_menu->result() : FALSE;

                            if ($res_sub_menu != FALSE)
                            {
                                ?>
                                <li class="treeview">
                                    <a href="<?php echo base_url($menu_url); ?>">
                                        <i class="fa fa-square-o"></i>
                                        <span><?php echo ucwords($val_menu->menu_ket); ?></span>
                                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <?php
                                        foreach ($res_sub_menu as $val_sub_menu)
                                        {
                                            ?>
                                            <li><a href="<?php echo base_url($val_sub_menu->menu_url); ?>"><i class="fa fa-circle-o"></i> <?php echo ucwords($val_sub_menu->menu_ket); ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                            else
                            {
                                ?>
                                <li>
                                    <a href="<?php echo base_url($menu_url); ?>">
                                        <?php
                                        if ($val_menu->menu_ket === "dashboard")
                                        {
                                            ?>
                                            <i class="fa fa-th"></i>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <i class="fa fa-square"></i>
                                            <?php
                                        }
                                        ?>
                                        <span><?php echo ucwords($val_menu->menu_ket); ?></span>
                                        <?php
                                        if ($val_menu->menu_url === "cpanel_aktivasi" && $jml !== 0)
                                        {
                                            ?>
                                            <span class="pull-right-container">
                                                <small class="label pull-right bg-red"><?php echo $jml; ?></small>
                                            </span>
                                            <?php
                                        }

                                        if ($val_menu->menu_url === "cpanel_peserta" && $jml_daftar !==0)
                                        {
                                            ?>
                                            <span class="pull-right-container">
                                                <small class="label pull-right bg-red"><?php echo $jml_daftar; ?></small>
                                            </span>
                                            <?php
                                        }
                                        ?>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
            <!-- /.sidebar-menu -->
            </section>
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo isset($ch) ? $ch : ""; ?>
                    <small><?php echo isset($cho) ? $cho : ""; ?></small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

            <!-- Your Page Content Here -->
