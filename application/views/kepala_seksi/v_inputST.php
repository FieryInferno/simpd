<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>

<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Tambah Surat Tugas</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."index.php/kepala_seksi/kasi/input_surattugas";?>">
                <!-- text input -->
               
                <div class="form-group">
                  <label>Nomor Surat Tugas</label>
                  <input type="text" name = "nomor_surattugas" class="form-control" placeholder="Enter ..." >
                </div>
                <div class="row">
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nomor SPD</label>
                         <select name="id_spd" class='form-control' value="<?php echo $nomor_spd; ?>">
                            < <?php 

                $sql = $this->db->get('spd');
                foreach ($sql->result() as $key => $value) {
                  ?>
                            <option value='<?php echo $value->id_spd ?>'><?php echo $value->nomor_spd ?> </option>
                          

                  <?php
                }

               ?>

                        </select>
                      </div>
                    </div>
                
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