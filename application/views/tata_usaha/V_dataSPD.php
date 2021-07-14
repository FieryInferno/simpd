 <center><div class="alert alert-success alert-dismissible" style = "color: blue;" role="alert"><h4>
               Selamat datang <?php echo $_SESSION['nama']?>, anda login sebagai</strong>
                <?php
                switch ($_SESSION['akses']) {
                  case 'tu':
                    echo 'Tata Usaha';
                    break;
                  case 'Admin ':
                    echo 'admin';
                    break;
                    default:
                    # code...
                    break;
                }
              ?>
          <strong><h4>
      </div> </center>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data SPD</h3>
      </div>
      <div class="box-body">
        <a href="<?= base_url(); ?>tata_usaha/tata_usaha/tambah_spd" button type="button" class="btn btn-primary float-left"><i class="fa fa-plus-square-o"></i> Tambah </a>
        <hr>
        <table id="example1" class = "table table-bordered table-striped">
          <thead>
            <tr class="nowrap">
              <th>Nomor SPD</th>  
              <th>Tujuan</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data->result() as $row) : ?>
              <tr>
                <td><?php echo $row->nomor_spd?></td>
                <td><?php echo $row->tujuan?></td>
                <td><?php echo $row->tanggalBerangkat; ?></td>
                <td><?php echo $row->keterangan?></td>
                <td>
                  <a href="edit_spd/<?php echo $row->id_spd ?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i> Ubah </a>
                  <a href="hapus_spd/<?php echo $row->id_spd ?>" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Hapus </a>
                  <a href="<?= base_url('tata_usaha/tata_usaha/lihat_spd/' . $row->id_spd); ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i> Lihat Surat</a>
                  <a  data-toggle="modal" data-target="#Modalupload<?= $row->id_spd; ?>" class="btn btn-primary btn-sm" ><i class="fa fa-upload"></i> Upload </a>
                  <?php
                    if ($row->file_ttd) { ?>
                      <a href="<?= base_url('assets/file_spd_fix/' . $row->file_ttd); ?>" class="btn btn-warning btn-sm" ><i class="fa fa-print"></i> Lihat File TTD </a>
                    <?php }
                  ?>
                  <div class="modal fade" id="Modalupload<?= $row->id_spd; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Upload SPD</h4>
                        </div>
                        <div class="modal-body">
                          <div class="card-body">
                            <form role="form" enctype ="multipart/form-data"  method= "post" action ="<?php echo base_url()."tata_usaha/tata_usaha/upload/" ;?>">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>File SPD</label>
                                    <input type="file" class="form-control" name="filettd" required="required" />
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
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>