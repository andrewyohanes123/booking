<div id="page-wrapper">
    <div class="row">
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12" style="padding-top:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Antrian Tanggal <?php echo ($this->input->get('tanggal_yang_diminta') == NULL) ? date('d',strtotime('+1 day')) : $this->input->get('tanggal_yang_diminta') ;   ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <form  action="<?php echo base_url('index.php/admin/seluruh_antrian') ?>" method="get">
                    <div class="row col-lg-12" >
                        <label>Tanggal</label>
                      <input class="form-control" id="input-tanggal" type="number" min="<?php echo date('d',strtotime('+1 day')); ?>" max="<?php echo $tanggal_terakhir; ?>" name="tanggal_yang_diminta" value="<?php echo ($this->input->get('tanggal_yang_diminta') == NULL) ? date('d',strtotime('+1 day')) : $this->input->get('tanggal_yang_diminta') ;   ?>">
                      <button type="submit" class="btn btn-outline btn-default">Submit</button>
                    </div>
                  </form>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if($datas != NULL){ ?>
                            <?php $datas[0]->pertama = 'TRUE' ?>
                              <?php foreach($datas as $data) {?>
                                  <tr class="odd gradeX">
                                    <td><?php echo $data->nama?></td>
                                    <td><?php echo $data->tujuan ?></td>
                                    <td><?php echo $data->tanggal ?></td>
                                    <td><?php echo $data->jam ?></td>
                                  </tr>
                              <?php } ?>
                          <?php } ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

</div>

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


</body>

</html>
