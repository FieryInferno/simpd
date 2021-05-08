<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="assets/images/logobps.png" type="image/x-icon" />
  <title>SIMPD | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
  <table>
    <tr>
      <td width="150px" class="text-center">BADAN PUSAT STATISTIK</td>
      <td width="300px">&nbsp;</td>
      <td class="text-right" style="border-bottom: black;border-bottom-style: solid;">Nomor : <?= $this->input->post('nomor_spd'); ?></td>
    </tr>
    <tr>
      <td style="border-bottom: black;border-bottom-style: solid;" class="text-center">PROVINSI JAWA BARAT</td>
      <td>&nbsp;</td>
      <td>Lembar ke : </td>
    </tr>
  </table>
  <br>
  <div class="text-center"><strong>SURAT PERJALANAN DINAS</strong></div>
  <table border="1" width="100%">
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>1. </td>
            <td style="padding-left:10px;"> Pejabat Pembuat Komitmen</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><strong><u><?= $this->session->nama; ?></u></strong></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>2. </td>
            <td style="padding-left:10px;">Nama Pegawai yang Melaksanakan Perjalanan Dinas</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $pegawai['nama']; ?></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>3. </td>
            <td>
              <ol type="a">
                <li>Pangkat dan Golongan</li>
                <li>Jabatan/Instansi</li>
                <li>Tingkat Biaya Perjalanan Dinas</li>
              </ol>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <ol type="a">
          <li><?= $pegawai['namagolongan']; ?></li>
          <li><?= $pegawai['jabatan']; ?></li>
          <li>Tingkat <?= $this->input->post('tingkat_biaya'); ?></li>
        </ol>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>4. </td>
            <td style="padding-left:10px;"> Maksud Perjalanan Dinas</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $this->input->post('tujuan'); ?></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>5. </td>
            <td style="padding-left:10px;"> Alat Angkutan yang Dipergunakan</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $this->input->post('kendaraan'); ?></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>6. </td>
            <td>
              <ol type="a">
                <li>Tempat Berangkat</li>
                <li>Tempat Tujuan</li>
              </ol>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <ol type="a">
          <li>Provinsi <?= $provinsi_berangkat['nama']; ?> Kabupaten <?= $kabupaten_berangkat['nama']; ?> Kecamatan <?= $kecamatan_berangkat['nama']; ?></li>
          <li>Provinsi <?= $provinsi_tujuan['nama']; ?> Kabupaten <?= $kabupaten_tujuan['nama']; ?> Kecamatan <?= $kecamatan_tujuan['nama']; ?></li>
        </ol>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>7. </td>
            <td>
              <div>a.Lamanya Perjalanan Dinas</div>
              <div>b.Tanggal Berangkat</div>
              <div>c.Tanggal Harus Kembali/Tiba Tempat Baru</div>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <div>a. <?= $lama_hari; ?></div>
        <div>b. <?= $this->input->post('tanggalBerangkat'); ?></div>
        <div>c. <?= $this->input->post('tanggalKembali'); ?></div>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>8. </td>
            <td>Pengikut</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              
               <div> 1. <?= $pegawai1['nama']; ?> </div>
               <div> 2. <?= $pegawai2['nama']; ?> </div>
               <div> 3. <?= $pegawai3['nama']; ?> </div>
              
            </td>
          </tr>
        </table>
      </td>

      <td width="60%" style="padding-left:10px;">
         <table>
          <tr>
            <td>Tanggal Lahir </td>
            
          </tr>
          <tr>
            <td>
              
              <div>  1. <?= $pegawai1['tanggallahir']; ?> </div>
            <div>    2. <?= $pegawai2['tanggallahir']; ?> </div>
              <div>  3. <?= $pegawai3['tanggallahir']; ?> </div>
              
            </td>
          </tr>
        </table>
      </td>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>9. </td>
            <td>Pembebanan Anggaran</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <div>Program</div>
              <div>Kegiatan</div>
              <div>Komponen</div>
              <div>a. Instansi</div>
              <div>b. Mata Anggaran</div>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <table>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <div>Program Penyediaan dan Pelayanan Informasi Statistik</div>
              <div>Penyediaan dan Pengembangan Statistik Harga</div>
              <div>Survei Harga Perdesaan</div>
              <div>a. Badan Pusat Statistik</div>
              <div>b. 054.01.06.2903.009.300.52413</div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>10. </td>
            <td style="padding-left:10px;">Keterangan Lain - Lain</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $this->input->post('keterangan'); ?></td>
    </tr>
  </table>
  <table width="100%">
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;">
        <table width="100%">
          <tr>
            <td width="50%">Dikeluarkan di</td>
            <td width="50%">: Subang</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;border-bottom: black;border-bottom-style: solid;">
        <table width="100%">
          <tr>
            <td width="50%">Pada Tanggal</td>
            <td width="50%">: <?= date('d M Y'); ?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">Pejabat Pembuat Komitmen</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">BPS Kabupaten Subang</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center"><strong><u><?= $this->session->nama; ?></u></strong></td><?= $this->session->nip; ?>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">NIP. <?= $this->session->nip; ?></td>
    </tr>
  </table>

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
