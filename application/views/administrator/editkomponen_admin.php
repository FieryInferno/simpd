
<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Edit Komponen</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."administrator/administrator/do_editkomponen";?>">
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" name = "id_komponen" class="form-control" value = "<?php echo $id_komponen ?>">
                </div>
                <div class="form-group">
                  <label>Kode Komponen</label>
                  <input required="required" type="text" name = "kode_komponen" class="form-control" value = "<?php echo $kode_komponen ?>" >
                </div>
                <div class="form-group">
                  <label>Nama Komponen</label>
                  <input required="required" type="text" name = "nama_komponen" class="form-control" value = "<?php echo $nama_komponen ?>" >
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