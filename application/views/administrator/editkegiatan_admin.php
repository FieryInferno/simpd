

<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Edit Kegiatan</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."administrator/administrator/do_editkegiatan";?>">
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" name = "id_kegiatan" class="form-control" value = "<?php echo $id_kegiatan ?>">
                </div>
                <div class="form-group">
                  <label>Kode Kegiatan</label>
                  <input required="required" type="text" name = "kode_kegiatan" class="form-control" value = "<?php echo $kode_kegiatan ?>" >
                </div>
                <div class="form-group">
                  <label>Nama Kegiatan</label>
                  <input required="required" type="text" name = "nama_kegiatan" class="form-control" value = "<?php echo $nama_kegiatan ?>" >
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