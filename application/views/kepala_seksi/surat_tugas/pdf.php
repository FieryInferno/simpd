
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
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
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
	<div class="text-center"> <img src="<?php echo base_url(); ?>assets/images/logobps.png" width = "100px">BADAN PUSAT STATISTIK KABUPATEN SUBANG</div>
 
  <div class="text-center"><strong>SURAT TUGAS</strong></div>
  <div class="text-center"><strong><?= $this->input->post('nomor_surattugas'); ?></strong></div>
  
  <br>
  <br>
 <div> Yang bertanda tangan di bawah ini :</div>
  		<div class="text-center"><strong>Kepala Badan Pusat Statistik Kabupaten Subang </strong></div>
  <div>Memberikan tugas kepada :</div>
  <table id="example1" class = "table table-bordered table-striped">
                <thead>
                  <tr class="nowrap">
                    <th>Nama </th>  
                    <th>Jabatan</th>
                    <th>Tujuan</th>
                    <th>Waktu Pelaksanaan</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                       <td><?= $spd['tujuan']; ?></td>
                        <td><?= $spd['tanggal_berangkat']; ?></td>

                      </tbody>
                  </tr>
              </table>
     
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">Pejabat Pembuat Komitmen</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">Kepala BPS Kabupaten Subang</td>
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
</body>
</html>
