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
  <style type="text/css" media="print">
    @page { size: landscape; }
  </style>
</head>
<body>
  <?php
    function penyebut($nilai) {
      $nilai = abs($nilai);
      $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
      $temp = "";
      if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
      } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
      } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
      } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
      } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
      } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
      } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
      } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
      } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
      } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
      }     
      return $temp;
    }
  
    function terbilang($nilai) {
      if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
      } else {
        $hasil = trim(penyebut($nilai));
      }         
      return $hasil;
    }

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
  ?>
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
            <td><img src="<?= base_url('assets/file_realisasi/' . $row['bukti']); ?>" alt="" width="25%"></td>
            <td><?php echo $row['keterangan']; ?></td>
          </tr>
        <?php }
      ?>
    </tbody>
  </table>

  <table width="100%">
    <tr>
      <td width="50%"></td>
      <td width ="50%">
        <div class="text-center">Subang, <?= tgl_indo(date('Y-m-d')); ?></div>
        <div class="text-center">Yang melaporkan</div>
        <br><br><br><br>
        <div class="text-center"><strong><u><?= $this->session->nama; ?></u></strong></div>
        <div class="text-center">NIP. <?= $this->session->nip; ?></div>
      </td>
    </tr>
  </table>
  <div style="page-break-before: always;"></div>

<div class="text-center">PENGEMBALIAN BIAYA PERJALANAN DINAS</div>
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">Rincian Biaya</th>
      <th scope="col">Realiasasi Biaya</th>
      <th scope="col">Pengembalian Biaya</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
        $total_transportasi = ((integer) $transportasi['biaya'] * $lama_hari) - ((integer) $realisasi_transportasi);
      ?>
      <td>Transportasi : <?= 'Rp. ' . number_format($transportasi['biaya'] * $lama_hari, 2, ',', '.'); ?></td>
      <td>Transportasi : <?= 'Rp. ' . number_format($realisasi_transportasi, 2, ',', '.'); ?></td>
      <td><?= 'Rp. ' . number_format($total_transportasi, 2, ',', '.'); ?></td>
    </tr>
    <tr>
      <?php
        $total_penginapan = ((integer) $uangHarian * $lama_hari) - ((integer) $realisasi_penginapan);
      ?>
      <td>Penginapan : <?= 'Rp. ' . number_format($uangHarian * $lama_hari, 2, ',', '.'); ?></td>
      <td>Penginapan : <?= 'Rp. ' . number_format($realisasi_penginapan, 2, ',', '.'); ?></td>
      <td><?= 'Rp. ' . number_format($total_penginapan, 2, ',', '.'); ?></td>
    </tr>
    <?php
      if (isset($representasi)) { ?>
        <tr>
          <?php
            $total_representasi = ((integer) $representasi * $lama_hari) - ((integer) $realisasi_representasi);
          ?>
          <td>Representasi : <?= 'Rp. ' . number_format($representasi * $lama_hari, 2, ',', '.'); ?></td>
          <td>Representasi : <?= 'Rp. ' . number_format($realisasi_representasi, 2, ',', '.'); ?></td>
          <td><?= 'Rp. ' . number_format($total_representasi, 2, ',', '.'); ?></td>
        </tr>
      <?php }
    ?>
      <tr>
    <tr>
      <?php
        $total_total  = $total_penginapan + $total_transportasi;
        isset($representasi) ? $total_total += $total_representasi : '';
      ?>
      <td></td>
      <td></td>
      <td><?='Rp. ' . number_format($total_total, 2, ',', '.'); ?></td>
    </tr>
  </tbody>
</table>

  <table width="100%">
    <tr>
      <td width="50%"></td>
      <td width ="50%">
        <div class="text-center">Subang, <?= tgl_indo(date('Y-m-d')); ?></div>
        <div class="text-center">Yang melaporkan</div>
        <br><br><br><br>
        <div class="text-center"><strong><u><?= $this->session->nama; ?></u></strong></div>
        <div class="text-center">NIP. <?= $this->session->nip; ?></div>
      </td>
    </tr>
  </table>
  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>