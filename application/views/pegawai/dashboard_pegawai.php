<center>
  <div class="alert alert-success alert-dismissible" style = "color: blue;" role="alert"><h4>
    Selamat datang <?php echo $_SESSION['nama']?>, anda login sebagai </strong>
    <?php
      switch ($_SESSION['akses']) {
        case 'tu':
          echo 'Tata Usaha';
          break;
        case 'Admin ':
          echo 'Admin';
          break;
        case 'pegawai':
          echo 'Pegawai';
          break;

          default:
          # code...
          break;
      }
    ?>
    <strong><h4>
  </div> 
</center>