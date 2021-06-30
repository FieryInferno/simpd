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
</head>
<body>
  <div class="text-center">LAPORAN HASIL PERJALANAN DINAS DALAM KOTA (LEBIH DARI 8 JAM)</div>
  <table>
    <tr>
      <td>Nama Pelaksana</td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= count($lhp) > 0 ? $lhp[0]->nama_pegawai : '' ; ?></td>
    </tr>
    <tr>
      <td>Wilayah Tugas</td>
      <td>&nbsp;:&nbsp;</td>
      <td>Kecamatan <?= count($lhp) > 0 ? $lhp[0]->nama_kecamatan : '' ; ?></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td>&nbsp;:&nbsp;</td>
      <td>
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
          echo count($lhp) > 0 ? tgl_indo($lhp[0]->tanggalBerangkat) : '' ; ?>
      </td>
    </tr>
    <tr>
      <td>Dalam Rangka</td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= count($lhp) > 0 ? $lhp[0]->tujuan : '' ; ?></td>
    </tr>
  </table>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nomor SPD</th>
        <th scope="col">Kegiatan</th>
        <th scope="col">Jam</th>
        <th scope="col">Permasalahan</th>
        <th scope="col">Solusi</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Bukti</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($lhp as $row) { ?>
          <tr>
            <td><?php echo $row->nomor_spd?></td>
            <td><?php echo $row->kegiatan?></td>
            <td><?php echo $row->jam?></td>
            <td><?php echo $row->permasalahan?></td>
            <td><?php echo $row->solusi?></td>
            <td><?php echo $row->keterangan?></td>
            <td><img src="<?= base_url('assets/' . $row->bukti_kegiatan); ?>" alt="" width="100%"></td>
          </tr>
        <?php }
      ?>
    </tbody>
  </table>
  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>