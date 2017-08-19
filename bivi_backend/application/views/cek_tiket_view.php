<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bivi</title>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/css.css">

    <link href="<?php echo base_url()?>assets/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/template/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/template/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <h1 class="page-header">Bivi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo base_url('index.php/index/cek_tiket/') ?>" method="post">
                                        <div class="form-group">
                                            <label>Masukan ID anda</label>
                                            <input class="form-control" name="unique_id" >
                                        </div>
                                        </div>
                                        <div class="btn-group" id="cek_tiket">
                                          <button type="submit" class="btn btn-default">Cek Tiket</button>
                                          <a class="btn btn-default" href="<?php echo base_url('index.php/index/index') ?>">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>

                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/template') ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/template') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/template') ?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/template') ?>/dist/js/sb-admin-2.js"></script>

</body>

</html>
