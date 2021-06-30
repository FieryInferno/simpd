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
                    <a href="<?= base_url('pegawai/realisasi_biaya/detail/' . $row->id_spd); ?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-eye"></i> Detail </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pengembalianBiaya<?= $row->id_spd; ?>">
                      Pengembalian Biaya
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="pengembalianBiaya<?= $row->id_spd; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Realisasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="<?= base_url('pegawai/pengembalian_biaya/' . $row->id_spd); ?>" method="post" target="_blank">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="">Realisasi Transportasi</label>
                                <input type="text" name="realisasi_transportasi" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="">Realisasi Penginapan</label>
                                <input type="text" name="realisasi_penginapan" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="">Realisasi Representasi</label>
                                <input type="text" name="realisasi_representasi" class="form-control">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <a href="<?= base_url('pegawai/realisasi_biaya/cetak/' . $row->id_spd); ?>" type="button" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak </a>
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