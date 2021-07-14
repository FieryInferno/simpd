
<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Tambah Provinsi</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."administrator/administrator/doinputprovinsi";?>">
                <!-- text input -->
                <div class="form-group">
            <label>Id</label>
                  <input type="text" name = "id" class="form-control" placeholder= "Enter">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input required="required" type="text" name = "nama" class="form-control" placeholder="Enter ..." >
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