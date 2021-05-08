<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="row">
        <div class="col-xs-12">
			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jabatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <a href="<?php echo base_url()."index.php/Administrator/Administrator/input_jabatan"?>" button type="button" class="btn btn-primary float-left"><i class="fa fa-plus-square-o"></i> Tambah </a>
               <hr>

              <table id="example1" class = "table table-bordered table-striped">
                <thead>
                <tr class="nowrap">
                  <th>ID</th>
                  <th>Jabatan</th>  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($data->result() as $row) : ?>
                <tr>
                  <td><?php echo $row->id?></td>
                  <td><?php echo $row->jabatan?></td>
                  <td>
                    <a href="edit_jabatan/<?php echo $row->id ?>" type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i> Ubah </a>
               
                    <a href="hapus_jabatan/<?php echo $row->id ?>" type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Hapus </a>

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