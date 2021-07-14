<center>
  <div class="alert alert-success alert-dismissible" style = "color: blue;" role="alert">
    <h4>
      Selamat datang <?php echo $_SESSION['nama']?>, anda login sebagai <strong>Kepala Seksi</strong>
    <h4>
  </div> 
</center>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data SPD</h3>
      </div>
      <div class="box-body">
        <?= $this->session->pesan ? $this->session->pesan : '' ; ?>
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
            <?php foreach ($data as $row) : ?>
              <tr>
                <td><?php echo $row->nomor_spd?></td>
                <td><?php echo $row->tujuan?></td>
                <td><?php echo $row->tanggalBerangkat; ?></td>
                <td></td>
                <td>
                  <a href="<?= base_url('kepala_seksi/spd/lihat/' . $row->id_spd); ?>" class="btn btn-success" ><i class="fa fa-eye"></i> Lihat </a>
                  <?php
                    switch ($row->status) {
                      case 'belum_konfirmasi': ?>
                        <a href="<?= base_url('kepala_seksi/spd/konfirmasi/' . $row->id_spd); ?>" class="btn btn-primary" ><i class="fa fa-check"></i> Konfirmasi </a>
                        <?php break;
                      case 'konfirmasi': ?>
                        <button class="btn btn-success" ><i class="fa fa-check"></i> Telah Dikonfirmasi </button>
                        <?php break;
                      
                      default:
                        # code...
                        break;
                    }
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>