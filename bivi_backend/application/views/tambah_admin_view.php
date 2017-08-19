<div id="page-wrapper">
  <?php if($status ==1 ) {?>
  <div class="alert alert-danger alert-dismissable">
    <center><h4><?php echo $notif; ?></h4></center>
  </div>
    <?php }elseif($status ==2) {?>
      <div class="alert alert-success">
        <center><h4><?php echo $notif; ?></h4></center>
      </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12">
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12" style="padding-top:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Keterangan Antrian Selesai
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="<?php echo base_url('index.php/admin/tambah_admin')?>" method="post">
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" class="form-control" name="nama_admin">
                                    <label >Username</label>
                                    <input type="text" class="form-control" name="username">
                                    <label >Password</label>
                                    <input type="password" class="form-control" name="password" ><br>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
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
