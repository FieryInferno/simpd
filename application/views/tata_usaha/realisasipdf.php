<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="assets/images/logobps.png" type="image/x-icon" />
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="text-center"><strong>LAPORAN REALISASI BIAYA</strong></div>
  <table>
    <tr>
      <td><strong>Nama Pelaksana</strong></td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= count($realisasi) > 0 ? $realisasi[0]['nama'] : '' ; ?></td>
    </tr>
    <tr>
      <td><strong>Nomor SPD</strong></td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= count($realisasi) > 0 ? $realisasi[0]['nomor_spd'] : '' ; ?></td>
    </tr>
    <tr>
      <td><strong>Tanggal</strong></td>
      <td>&nbsp;:&nbsp;</td>
      <td>
        <?php 
          echo count($realisasi) > 0 ? tgl_indo($realisasi[0]['tanggalBerangkat']) : '' ; ?>
      </td>
    </tr>
    <tr>
      <td><strong>Dalam Rangka</strong></td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= count($realisasi) > 0 ? $realisasi[0]['tujuan'] : '' ; ?></td>
    </tr>
  </table>
  <br>
  <table class="table table-bordered">
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
        foreach ($realisasi as $row) { ?>
          <tr>
            <td><?php echo $row['nomor_spd']; ?></td>
            <td><?php echo $row['nama_pengeluaran']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
            <td><img src="<?= base_url('assets/' . $row['bukti']); ?>" alt="" width="10%"></td>
            <td><?php echo $row['keterangan']; ?></td>
          </tr>
        <?php }
      ?>
    </tbody>
  </table>
  <table width="100%">
    <tr>
      <td width="90"></td>
      <td width="10">
        <div class="text-center">Subang, 
          <?php
            function tgl_indo($tanggal){
              $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
              );
              $pecahkan = explode('-', $tanggal);
              return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
            }
            
            echo tgl_indo(date('Y-m-d'));
          ?>
        </div>
        <div class="text-center">Yang Melaporkan</div>
        <br><br><br>
        <div class="text-center"><strong>(<?= $realisasi[0]['nama']; ?>)</strong></div>
        <div class="text-center"><strong>NIP. <?= $realisasi[0]['nip']; ?></strong></div>
      </td>
    </tr>
  </table>
</body>
</html>