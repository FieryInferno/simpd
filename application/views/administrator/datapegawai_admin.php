<center><div class="alert alert-success alert-dismissible" style = "color: blue;" role="alert"><h4>
               Selamat datang <?php echo $_SESSION['nama']?>, anda login sebagai</strong>
                <?php
                switch ($_SESSION['akses']) {
                  case 'tu':
                    echo 'Tata Usaha';
                    break;
                  case 'admin':
                    echo 'Admin';
                    break;
                     case 'pegawai ':
                    echo 'Pegawai';
                    break;

                    default:
                    # code...
                    break;
                }
              ?>
          <strong><h4>
      </div> </center>
<div class="row">
        <div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pegawai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <a href="<?php echo base_url()."administrator/administrator/input_pegawai"?>" button type="button" class="btn btn-primary float-left"><i class="fa fa-plus-square-o"></i> Tambah </a>
               <hr>
 <?php if ($this->session->pesan) echo $this->session->pesan; ?> 
              <table id="example1" class = "table table-bordered table-striped">
                <thead>
                <tr class="nowrap">
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>  
                  <th>J. Kelamin</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jabatan</th>
                  <th>Golongan</th>
                 <th>eselon</th> 
                  <th>agama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Akses</th>
                  <th>foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php    $no = 1; foreach ($data->result() as $row) : ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->nip?></td>
                  <td><?php echo $row->nama?></td>
                  <td><?php echo $row->jenis_kelamin?></td>
                  <td><?php echo $row->alamat?></td>
                  <td><?php echo $row->tempatlahir ?></td>
                  <td><?php echo $row->tanggallahir?></td>
                  <td><?php echo $row->jabatan?></td>
                  <td><?php echo $row->namagolongan?></td>
                  <td><?php echo $row->eselon?></td>
                  <td><?php echo $row->agama?></td>
                  <td><?php echo $row->username?></td>
                  <td><?php echo $row->password?></td>
                  <td><?php echo $row->akses?></td>
                  <td><?php echo $row->foto?></td>
                  <td>
                    <a href="edit_pegawai/<?php echo $row->id ?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i> Ubah </a>
               
                    <a href="hapus_pegawai/<?php echo $row->id ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data pegawai dengan id : <?php echo $row->id ?>');"  ><i class="fa fa-trash"></i> Hapus </a>

                  </td>
                </tr>
            <?php endforeach; ?>
               	</tbody>
              </table>
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 </div>
</div>
                  <th>Foto</th>