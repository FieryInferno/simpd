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
        <h3 class="box-title">Data LHP SPD</h3>
      </div>
      <div class="box-body">
        
        <hr>
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
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
            <?php foreach ($data->result() as $row) : ?>
              <tr>
                <td><?php echo $row->nomor_spd?></td>
                <td><?php echo $row->tujuan?></td>
                <td><?php echo $row->tanggalBerangkat; ?></td>
                <td>
                  <a href="<?= base_url()."tata_usaha/tata_usaha/lihat_realisasi/$row->id_spd"?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-eye"></i> Detail </a>
                  <?php
                    if ($row->file_pengembalian) { ?>
                      <a href="<?= base_url('assets/file_pengembalian/' . $row->file_pengembalian); ?>" class="btn btn-warning btn-sm" ><i class="fa fa-print"></i> Lihat Pengembalian Biaya </a>
                    <?php }
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>