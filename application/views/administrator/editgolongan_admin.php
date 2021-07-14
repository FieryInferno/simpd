
<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Edit Golongan</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."administrator/administrator/do_editgolongan";?>">
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" name = "id" class="form-control" value = "<?php echo $id ?>">
                </div>
                <div class="form-group">
                  <label>Golongan</label>
                  <input required="required" type="text" name = "golongan" class="form-control" value = "<?php echo $golongan ?>" >
                </div>
                <div class="form-group">
                  <label>Pangkat</label>
                  <input required="required" type="text" name = "pangkat" class="form-control" value = "<?php echo $pangkat ?>" >
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