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
        <hr>
        <table id="example1" class = "table table-bordered table-striped">
          <thead>
            <tr class="nowrap">
              <th>Nomor SPD</th>  
              <th>Tujuan</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $row) : ?>
              <tr>
                <td><?php echo $row->nomor_spd?></td>
                <td><?php echo $row->tujuan?></td>
                <td><?php echo $row->tanggalBerangkat; ?></td>
                <td><?php echo $row->keterangan?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>