
<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Tambah Jabatan</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."administrator/administrator/doinputjabatan";?>">
                <!-- text input -->
                <div class="form-group">
            
                  <input type="hidden" name = "id" class="form-control" placeholder= "Enter">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input  required="required" type="text" name = "jabatan" class="form-control" placeholder="Enter ..." >
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