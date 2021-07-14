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
              <h3 class="box-title">Data Kecamatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <a href="<?php echo base_url()."administrator/administrator/input_kecamatan"?>" button type="button" class="btn btn-primary float-left"><i class="fa fa-plus-square-o"></i> Tambah </a>
               <hr>
 <?php if ($this->session->pesan) echo $this->session->pesan; ?> 
              <table id="example1" class = "table table-bordered table-striped">
                <thead>
                <tr class="nowrap">
                  <th>No</th>
                  <th>ID Kabupaten</th>  
                  <th>Nama Kecamatan</th>  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php 
                     $no = 1;
                     foreach ($data->result() as $row) : ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $row->kabupaten_id?></td>
                  <td><?php echo $row->nama?></td>
                  <td>
                    <a href="edit_kecamatan/<?php echo $row->id ?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i> Ubah </a>
               
                    <a href="hapus_kecamatan/<?php echo $row->id ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data kecamatan dengan id : <?php echo $row->id ?>');" ><i class="fa fa-trash"></i> Hapus </a>

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