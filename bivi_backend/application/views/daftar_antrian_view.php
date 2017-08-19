        <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="padding-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Antrian
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Penga ntri</th>
                                        <th>Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($datas != NULL){ ?>
                                    <?php $datas[0]->pertama = 'TRUE' ?>
                                      <?php foreach($datas as $data) {?>
                                        <?php if($data->tanggal == date('Y-m-d')) {?>
                                          <tr class="odd gradeX">
                                            <td><?php echo $data->nama?></td>
                                            <td><?php echo $data->tujuan ?></td>
                                            <td><?php echo $data->tanggal ?></td>
                                            <td><?php echo $data->jam ?></td>
                                            <?php if($data->tanggal == date('Y-m-d') && $data->pertama == 'TRUE'){ ?>
                                            <td><a href="<?php echo base_url('index.php/admin/status_pengatri/').$data->id_antri ?>">Sudah datang</a></td>
                                            <td><a href="<?php echo base_url('index.php/admin/field_antrian_selesai/').$data->id_antri ?>">Selesai</a></td>
                                            <?php }else{ ?>
                                            <td>Sudah datang</td>
                                            <td>Selesai</td>
                                            <?php } ?>
                                          </tr>
                                        <?php } ?>
                                      <?php } ?>
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

    <script src="<?php echo base_url('assets/template') ?>/dist/js/sb-admin-2.js"></script>
    <?php if($datas != NULL) {?>
        <?php if($datas[0]->tanggal == date('Y-m-d')) {?>
              <?php header('Refresh:'.$waktu_refresh.';'); ?>
        <?php } ?>
    <?php } ?>

</body>

</html>
