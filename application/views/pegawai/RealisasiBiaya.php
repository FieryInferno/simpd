<center>
  <div class="alert alert-success alert-dismissible" style = "color: blue;" role="alert"><h4>
    Selamat datang <?php echo $_SESSION['nama']?>, anda login sebagai </strong>
    <?php
      switch ($_SESSION['akses']) {
        case 'tu':
          echo 'Tata Usaha';
          break;
        case 'Admin ':
          echo 'Admin';
          break;
        case 'pegawai':
          echo 'Pegawai';
          break;

          default:
          # code...
          break;
      }
    ?>
    <strong><h4>
  </div> 
</center>
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
                    <a href="<?= base_url('tata_usaha/tata_usaha/lihat_spd/' . $row->id_spd); ?>" type="button" class="btn btn-success" target="_blank"><i class="fa fa-eye"></i> Lihat Surat SPD </a>
                    <a class="btn btn-primary"  href="<?php echo base_url('pegawai/pegawai/data_realisasibiaya/' . $row->id_spd); ?>">
                      Detail Realisasi Biaya
                    </a>

                    <!-- Button trigger modal -->
                    <a href="<?= base_url('pegawai/pegawai/pengembalianbiaya/' . $row->id_spd); ?>" class="btn btn-warning" target="_blank">
                      Pengembalian Biaya
                    </a>
                    <a  data-toggle="modal" data-target="#Modalupload<?= $row->id_spd; ?>" class="btn btn-primary" ><i class="fa fa-upload"></i> Upload </a>
                  
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