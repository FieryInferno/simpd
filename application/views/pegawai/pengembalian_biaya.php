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
  ?>
  <div class="text-center">PENGEMBALIAN BIAYA PERJALANAN DINAS</div>
  <table>
    <tr>
      <td>Nama Pelaksana</td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= $this->session->nama; ?></td>
    </tr>
    <tr>
      <td>Wilayah Tugas</td>
      <td>&nbsp;:&nbsp;</td>
      <td>Kecamatan <?= $spd['nama_kecamatan']; ?></td>
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
          echo tgl_indo($spd['tanggalBerangkat']); ?>
      </td>
    </tr>
    <tr>
      <td>Dalam Rangka</td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= $spd['tujuan']; ?></td>
    </tr>
  </table>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Rincian Biaya</th>
        <th scope="col">Realiasasi Biaya</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Transportasi : <?= 'Rp. ' . number_format($transportasi['biaya'], 2, ',', '.'); ?></td>
        <td>Transportasi : <?= 'Rp. ' . number_format($this->input->post('realisasi_transportasi'), 2, ',', '.'); ?></td>
        <td><?= 'Rp. ' . number_format(((integer) $transportasi['biaya']) - ((integer) $this->input->post('realisasi_transportasi')), 2, ',', '.'); ?></td>
      </tr>
      <tr>
        <td>Penginapan : <?= 'Rp. ' . number_format($uangHarian, 2, ',', '.'); ?></td>
        <td>Penginapan : <?= 'Rp. ' . number_format($this->input->post('realisasi_penginapan'), 2, ',', '.'); ?></td>
        <td><?= 'Rp. ' . number_format(((integer) $uangHarian) - ((integer) $this->input->post('realisasi_penginapan')), 2, ',', '.'); ?></td>
      </tr>
      <?php
        if (isset($representasi)) { ?>
          <tr>
            <td>Representasi : <?= 'Rp. ' . number_format($representasi, 2, ',', '.'); ?></td>
            <td>Representasi : <?= 'Rp. ' . number_format($this->input->post('realisasi_representasi'), 2, ',', '.'); ?></td>
            <td><?= 'Rp. ' . number_format(((integer) $representasi) - ((integer) $this->input->post('realisasi_representasi')), 2, ',', '.'); ?></td>
          </tr>
        <?php }
      ?>
    </tbody>
  </table>

  <table width="100%">
    <tr>
      <td width="50%"></td>
      <td width="50%">
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