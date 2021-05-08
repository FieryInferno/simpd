<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="row">
        <div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pegawai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <a href="<?php echo base_url()."index.php/Administrator/Administrator/input_pegawai"?>" button type="button" class="btn btn-primary float-left"><i class="fa fa-plus-square-o"></i> Tambah </a>
               <hr>

              <table id="example1" class = "table table-bordered table-striped">
                <thead>
                <tr class="nowrap">
                  <th>NIP</th>
                  <th>Nama</th>  
                  <th>J. Kelamin</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jabatan</th>
                  <th>Golongan</th>
                  <th>agama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Akses</th>
                  <th>foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($data->result() as $row) : ?>
                <tr>
                  <td><?php echo $row->nip?></td>
                  <td><?php echo $row->nama?></td>
                  <td><?php echo $row->jenis_kelamin?></td>
                  <td><?php echo $row->alamat?></td>
                  <td><?php echo $row->tempatlahir ?></td>
                  <td><?php echo $row->tanggallahir?></td>
                  <td><?php echo $row->jabatan?></td>
                  <td><?php echo $row->namagolongan?></td>
                  <td><?php echo $row->agama?></td>
                  <td><?php echo $row->username?></td>
                  <td><?php echo $row->password?></td>
                  <td><?php echo $row->akses?></td>
                  <td><?php echo $row->foto?></td>
                  <td>
                    <a href="edit_pegawai/<?php echo $row->id ?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i> Ubah </a>
               
                    <a href="hapus_pegawai/<?php echo $row->id ?>" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Hapus </a>

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