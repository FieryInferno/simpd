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
        <h3 class="box-title">Data Realisasi Biaya SPD Nomor SPD <?= $nomor_spd; ?></h3>
      </div>
      <div class="box-body">
        <hr>
         <table id="" class = "table table-bordered table-striped">
          <thead>
            <tr class="nowrap">
              <th>Nomor SPD</th> 
              <th>Nama Pengeluaran</th>
              <th>Jumlah</th>
              <th>Bukti</th>
              <th>Keterangan</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($data as $row) { ?>
                <tr>
                  <td><?php echo $row->nomor_spd?></td>
                  <td><?php echo $row->nama_pengeluaran; ?></td>
                  <td><?php echo $row->jumlah; ?></td>
                  <td><img src="<?= base_url('assets/file_realisasi/' . $row->bukti); ?>" alt="" width="30%"></td>
                  <td><?php echo $row->keterangan?></td>
                  
                      <?php }
            ?>
                    </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
