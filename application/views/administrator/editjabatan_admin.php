<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>

<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Edit Jabatan</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."index.php/Administrator/Administrator/do_editjabatan";?>">
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" name = "id" class="form-control" value = "<?php echo $id ?>">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name = "jabatan" class="form-control" value = "<?php echo $jabatan ?>" >
                </div>
                <div class="row">   
                    <div class="col-sm-2">
                      <input type="submit" name="submit" value="SIMPAN" class="btn btn-primary float-left">
                    </div>
                   <div class="col-sm-2">
                      <input type="reset"  value="RESET" class="btn btn-danger">
                    </div>
                    </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>