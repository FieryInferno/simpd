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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    body{
      background-image : url('assets/images/bekgron5.jpg');
      background-size: cover ;
      background-attachment: fixed;
      background-repeat: no-repeat;
      font-family: courie
    }
    .login-box{
      position: relative;
      top: 150px;
      border: 10px solid rgba(0,0,0,.1);
      margin: auto;
    }
  </style>
</head>
<body>
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <?php if ($this->session->pesan) echo $this->session->pesan; ?> 
      <div class="login-box-body">
        <a href="<?php echo base_url(); ?>assets/index2.html"></center><img src="<?php echo base_url();?>assets/images/logobps.png" alt="AdminLTE Logo" width="90px" class="" style="opacity: .8; display : block; margin : auto;" ><br>
          <center><font face="calibri" size="3" color="black"><b>Sistem Informasi Manajemen Kegiatan Perjalanan Dinas Di Badan Pusat Statistik Subang</b></font></center>
        </a>
        <hr>
        <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
        <form action="<?php echo base_url('index.php/c_login/cek');?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class=" col-xs-8"></div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets//bootstrap.min.js"></script>
<!-- iCheck -->
<!-- <script src="../../plugins/iCheck/icheck.min.js"></script> -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
