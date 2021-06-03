<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data LHP Nomor SPD <?= $nomor_spd; ?></h3>
      </div>
      <div class="box-body">
        <a href="" button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-lhp" class="btn btn-primary float-left"><i class="fa fa-plus-square-o"></i> Tambah </a>
        <hr>
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <table id="" class = "table table-bordered table-striped">
          <thead>
            <tr class="nowrap">
              <th>Nomor SPD</th>
              <th>Kegiatan</th>  
              <th>Jam</th>
              <th>Permasalahan</th>
              <th>Solusi</th>
              <th>Keterangan</th>
              <th>Bukti</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($data as $row) { ?>
                <tr>
                  <td><?php echo $row->nomor_spd?></td>
                  <td><?php echo $row->kegiatan?></td>
                  <td><?php echo $row->jam?></td>
                  <td><?php echo $row->permasalahan?></td>
                  <td><?php echo $row->solusi?></td>
                  <td><?php echo $row->keterangan?></td>
                  <td><a href="<?= base_url('assets/' . $row->bukti_kegiatan); ?>" class="btn btn-primary" target="_blank">Lihat File</a></td>
                  <td>
                    <a href="<?= base_url()."pegawai/lhp/edit/$row->id_lhp"?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i> Ubah </a>
                    <a href="<?= base_url()."pegawai/lhp/hapus/$id_spd/$row->id_lhp"?>" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Hapus </a>
                  </td>
                </tr>
              <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="modal fade" id="modal-lhp">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">LHP</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <form role="form" enctype ="multipart/form-data" method = "post" action ="<?php echo base_url()."pegawai/lhp/tambah";?>" >
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nomor SPD</label>
                      <input type="text" class="form-control" value="<?= $nomor_spd; ?>" readonly>
                      <input type="hidden" name="id_spd" value="<?= $id_spd; ?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kegiatan</label>
                      <input type="text" class="form-control" name="kegiatan" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jam</label>
                      <input type="text" class="form-control" name="jam" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Bukti</label>
                      <input type="file" class="form-control" name="bukti_kegiatan" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Masalah</label>
                      <input type="text" class="form-control" name="permasalahan" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Solusi</label>
                      <input type="text" class="form-control" name="solusi" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label></label>
                      <input type="hidden" class="form-control" rows="3" name="id_pegawai" value = "<?php echo $_SESSION['id'] ?>" placeholder=""></textarea>
                    </div>
                  </div>  
                </div>         
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="submit"  value="SIMPAN"class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>