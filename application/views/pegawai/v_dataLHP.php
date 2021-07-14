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
        <h3 class="box-title">Data LHP</h3>
      </div>
      <!-- /.box-header -->
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
                  <a href="<?= base_url()."pegawai/pegawai/lihat_lhp/$row->id_spd"?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-eye"></i> Detail </a>
                  <a href="<?= base_url('tata_usaha/tata_usaha/lihat_spd/' . $row->id_spd); ?>" type="button" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat Surat SPD </a>
                  <a href="<?= base_url()."pegawai/pegawai/cetak_lhp/$row->id_spd" ?>" type="button" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak </a>
                </td>
                
              </tr>
           <?php }
                ?>
               	</tbody>
              </table>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
 </div>
</div>