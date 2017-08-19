        <div id="page-wrapper">
            <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12" style="padding-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo base_url('index.php/admin/set_option') ?>" method="post">
                                        <div class="form-group" id="lama">
                                            <label>Toleransi Tunggu(Menit)</label>
                                            <input class="form-control" name="toleransi" type="number" value="<?php echo gmdate('i', $data->toleransi); ?>">
                                        </div>
                                        <div class="form-group" id="lama">
                                          <label>Penanganan(Menit)</label>
                                          <input class="form-control" name="penanganan" type="number" value="<?php echo gmdate('i', $data->penanganan); ?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Jam Buka</label>
                                          <input class="form-control" id="set_waktu" name="jam_buka_jam" type="number" value="<?php echo gmdate('G', $data->jam_mulai); ?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_buka_menit"type="number" value="<?php echo gmdate('i', $data->jam_mulai); ?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_buka_detik" type="number" value="<?php echo gmdate('s', $data->jam_mulai);?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Jam Tutup</label>
                                          <input class="form-control" id="set_waktu" name="jam_tutup_jam" type="number" value="<?php echo gmdate('G', $data->jam_tutup);?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_tutup_menit" type="number" value="<?php echo gmdate('i', $data->jam_tutup);?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_tutup_detik" type="number" value="<?php echo gmdate('s', $data->jam_tutup);?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Jam Istirahat Mulai</label>
                                          <input class="form-control" id="set_waktu" name="jam_istirahat_jam" type="number" value="<?php echo gmdate('G', $data->jam_istirahat_mulai);?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_istirahat_menit" type="number" value="<?php echo gmdate('i', $data->jam_istirahat_mulai);?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_istirahat_detik" type="number" value="<?php echo gmdate('s', $data->jam_istirahat_mulai);?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Jam Istirahat Selesai</label>
                                          <input class="form-control" id="set_waktu" name="jam_istirahat_selesai_jam" type="number" value="<?php echo gmdate('G', $data->jam_istirahat_selesai);?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_istirahat_selesai_menit" type="number" value="<?php echo gmdate('i', $data->jam_istirahat_selesai);?>"> -
                                          <input class="form-control" id="set_waktu" name="jam_istirahat_selesai_detik" type="number" value="<?php echo gmdate('s', $data->jam_istirahat_selesai);?>">
                                        </div>
                                        <button class="submit" class="btn btn-default">Tetapkan Pengaturan</button>

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
