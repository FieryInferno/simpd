<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logobps.png" type="image/x-icon" />
  <title>SIMPD | TU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Ionicons/css/ionicons.min.css">
 
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url(); ?>assets/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="sidebar-mini skin-blue-light">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url(); ?>assets/index2.html" class="logo">
      <div class="pull-left image"><br></div>
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"> <FONT SIZE= "5"><b>SIMKPD</b></FONT></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="<?php echo base_url(); ?>assets/#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url(); ?>assets/#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/images/<?php echo $_SESSION['foto'] ;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['pegawai'] ;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/images/<?php echo $_SESSION['foto'] ;?>"  class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['pegawai'] ;?>
                  <font face="calibri" size = "5 " color="white"><?php echo $_SESSION['nama'] ;?></font> 
                </p>
              </li>
              <li class="user-body"></li>
              <li class="user-footer">
                <div class="pull-left">
                  <a class="btn btn-default btn-default" data-toggle="modal" data-target="#modal-info">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()."index.php/c_login/logout"?>" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <br>
          <img src="<?php echo base_url(); ?>assets/images/logobps.png" width = "100px">
        </div>
        <br>
        <a href="#" class="logo">
          <span class="logo-lg"><font face="arial" size ="5">  BPS Subang </font></span>
        </a>
        <br>
        <div class="panel">
          <ul class="sidebar-menu" data-widget="tree">
            <li>
              <a href="<?php echo base_url()."tata_usaha/tata_usaha"?>">
                <i class="fa fa-bank"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()."tata_usaha/spd"?>">
                <i class="fa fa-file"></i> <span>SPD</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <?php $this->load->view($content) ?>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="<?php echo base_url(); ?>assets/https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url(); ?>assets/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>assets/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url(); ?>assets/raphael.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url(); ?>assets/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url(); ?>assets/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url(); ?>assets/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url(); ?>assets/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url(); ?>assets/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url(); ?>assets/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>assets/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->

  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/dataTables.responsive.min.js"></script>
  <script>
    $('document').ready(() => {

    })

    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    function pilihProvinsi(data, tujuan) {
      $.ajax({
        url     : `<?= base_url(); ?>wilayah/kabupaten`,
        type    : 'post',
        data    : {
          id  : data.value
        }, 
        success : function(result){
          data  = '<option>Pilih Kabupaten</option>';
          result.forEach(element => {
            data  += `<option value="${element.id}">${element.nama}</option>`;
          });
          if (tujuan) {
            $('#tempat_tujuan_kabupaten').html(data);
          } else {
            $('#tempat_berangkat_kabupaten').html(data);
          }
        }
      });
    }

    function pilihKabupaten(data, tujuan) {
      $.ajax({
        url     : `<?= base_url(); ?>wilayah/kecamatan`,
        type    : 'post',
        data    : {
          id  : data.value
        }, 
        success : function(result){
          data  = '<option>Pilih Kecamatan</option>';
          result.forEach(element => {
            data  += `<option value="${element.id}">${element.nama}</option>`;
          });
          if (tujuan) {
            $('#tempat_tujuan_kecamatan').html(data);
          } else {
            $('#tempat_berangkat_kecamatan').html(data);
          }
        }
      });
    }
  </script>
<div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</body>
</html>