<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Realisasi Biaya</h3>
      </div>
      <div class="box-body">
        <hr>
        <table id="example1" class = "table table-bordered table-striped">
          <thead>
            <tr class="nowrap">
              <th>Nomor SPD</th>
              <th>Tujuan</th>  
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($data as $row) { ?>
                <tr>
                  <td><?php echo $row->nomor_spd?></td>
                  <td><?php echo $row->tujuan?></td>
                  <td><?php echo $row->tanggalBerangkat?></td>
                  <td>
                   
                    <a class="btn btn-primary"  href="<?php echo base_url('pegawai/pegawai/data_realisasibiaya/' . $row->id_spd); ?>">
                      Detail Realisasi Biaya
                    </a>

                    <!-- Button trigger modal -->
                    <a href="<?= base_url('pegawai/pegawai/pengembalianbiaya/' . $row->id_spd); ?>" class="btn btn-warning">
                      Pengembalian Biaya
                    </a>
                    <a  data-toggle="modal" data-target="#Modalupload<?= $row->id_spd; ?>" class="btn btn-primary btn-sm" ><i class="fa fa-upload"></i> Upload </a>
                  
                  <div class="modal fade" id="Modalupload<?= $row->id_spd; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Upload Pengembalian Biaya</h4>
                        </div>
                        <div class="modal-body">
                          <div class="card-body">
                            <form role="form" enctype ="multipart/form-data"  method= "post" action ="<?php echo base_url()."pegawai/pegawai/upload/" ;?>">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>File Pengembalian Biaya</label>
                                    <input type="file" class="form-control" name="file_pengembalian" required="required" />
                                    <input type="hidden" class="form-control" name="id_spd" value="<?= $row->id_spd; ?>" required="required" />
                                </div>         
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                            </form>
                      </div>
                      <!-- /.box -->
                    </div>
                  </div>
                </td>
                              </tr>
              <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>