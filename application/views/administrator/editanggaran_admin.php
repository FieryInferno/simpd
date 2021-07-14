

<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Edit Anggaran</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."administrator/administrator/do_editanggaran";?>">
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" name = "id_anggaran" class="form-control" value = "<?php echo $id_anggaran ?>">
                </div>
                <div class="form-group">
                  <label>Nomor</label>
                  <input type="text" name = "nomor_anggaran" class="form-control" value = "<?php echo $nomor_anggaran ?>" required="required" >
                </div>
                <div class="form-group">
                  <label>Anggaran</label>
                  <input type="text" name = "nama_anggaran" class="form-control" value = "<?php echo $nama_anggaran ?>" required="required" >
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