<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bivi</title>

    <link href="<?php echo base_url('assets/css/css.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/template') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/template') ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/template') ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/template') ?>/vendor/morrisjs/morris.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/template') ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Bivi</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('index.php/admin/ganti_password_view') ?>"><i class="fa fa-user fa-fw"></i>Ganti Password</a>
                        <li><a href="<?php echo base_url('index.php/admin/logout') ?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>
                          <a href="#"><i class="fa fa-table fa-fw"></i> Kelola Antrian<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="<?php echo base_url('index.php/admin/index') ?>"> Daftar Antrian</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url('index.php/admin/seluruh_antrian') ?>"> Daftar Seluruh Antrian</a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url('index.php/admin/antri_selesai_view') ?>"> Daftar Antrian Selesai</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Kelola Tujuan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/admin/tambah_tujuan') ?>">Tambah Tujuan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/admin/tujuan_list') ?>">List Tujuan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/tambah_admin_view')?>"><i class="fa fa-user fa-fw"></i> Tambah Admin</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('index.php/admin/option_view') ?>"><i class="fa fa-cog fa-fw"></i> Option</a>
                        </li>
                      </ul>
                </div>
            </div>
        </nav>

    </div>
