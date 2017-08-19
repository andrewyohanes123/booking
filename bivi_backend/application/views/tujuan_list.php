<div id="page-wrapper">
    <div class="row">
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12" style="padding-top:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Tujuan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Tujuan</th>
                                <th>Hapus</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($datas as $data) {?>
                            <tr class="odd gradeX">
                                <form class="" action="<?php echo base_url('index.php/admin/edit_tujuan/').$data->id_tujuan ?>" method="post">
                                <td><input type="text" class="form-control" name="tujuan" value="<?php echo $data->tujuan?>"></td>
                                <td><a href="<?php echo base_url('index.php/admin/hapus_tujuan/').$data->id_tujuan ?>">Hapus</a></td>
                                <td><button class="btn btn-default" type="submit" value="<?php echo $data->id_tujuan ?>">  &nbspEdit&nbsp  </button></td>
                                </form>
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

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

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/template') ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template') ?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/template') ?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/template') ?>/dist/js/sb-admin-2.js"></script>



<!-- Page-Level Demo Scripts - Tables - Use for reference -->


</body>

</html>
