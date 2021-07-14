<center><div class="alert alert-success alert-dismissible" style = "color: blue;" role="alert"><h4>
               Selamat datang <?php echo $_SESSION['nama']?>, anda login sebagai</strong>
                <?php
                switch ($_SESSION['akses']) {
                  case 'tu':
                    echo 'Tata Usaha';
                    break;
                  case 'Admin ':
                    echo 'Admin';
                    break;
                     case 'pegawai ':
                    echo 'Pegawai';
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
                 
                </tr>
              <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>