<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Detail Realisasi Biaya</h3>
      </div>
      <div class="box-body">
        <a href="" button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-lhp" class="btn btn-primary float-left"><i class="fa fa-plus-square-o"></i> Tambah </a>
        <hr>
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
        <table id="" class = "table table-bordered table-striped">
          <thead>
            <tr class="nowrap">
              <th>Nomor SPD</th> 
              <th>Nama Pengeluaran</th>
              <th>Jumlah</th>
              <th>Bukti</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($detail as $row) { ?>
                <tr>
                  <td><?php echo $row->nomor_spd?></td>
                  <td><?php echo $row->nama_pengeluaran; ?></td>
                  <td><?php echo $row->jumlah; ?></td>
                  <td><img src="<?= base_url('assets/' . $row->bukti); ?>" alt="" width="30%"></td>
                  <td><?php echo $row->keterangan?></td>
                  <td>
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
              <form role="form" enctype ="multipart/form-data" method = "post" action ="<?php echo base_url('pegawai/realisasi_biaya/detail/' . $id_spd); ?>">
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
                      <label>Nama Pengeluaran</label>
                      <input type="text" class="form-control" name="nama_pengeluaran" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" placeholder="" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Bukti</label>
                      <input type="file" class="form-control" name="bukti" placeholder="" >
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