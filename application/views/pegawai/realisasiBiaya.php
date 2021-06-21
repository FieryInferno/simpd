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