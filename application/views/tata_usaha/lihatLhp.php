<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data LHP Nomor SPD <?= $nomor_spd; ?></h3>
      </div>
      <div class="box-body">
        <hr>
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
  </div>
</div>