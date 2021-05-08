<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>

<div class="box">
            <div class="box-header with-border">
              <font face="calibri" size="5" color="black"><h2 class="box-title">Tambah Akun</h2></font>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" enctype ="multipart/form-data" method= "post" action ="<?php echo base_url()."index.php/Administrator/Administrator/doinputpegawai";?>">
                <!-- text input -->
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name = "nip" class="form-control" placeholder= "Enter">
                </div>
                <div class="form-group">
                  <label>Nama pegawai</label>
                  <input type="text" name = "nama" class="form-control" placeholder="Enter ..." >
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name ="jenis_kelamin" class="form-control">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Status</label>
                  <select name = "status" class="form-control">
                    <option value="Nikah">Nikah</option>
                    <option value="Belum Nikah">Belum Nikah</option>
                  </select>
                </div>
                <!-- /.input group -->
          
                <!-- textarea -->
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name = "alamat" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name = "tempatlahir" class="form-control" placeholder="Enter ..." >
                </div>
                <div class="form-group">
                <label>Tanggal Lahir:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name = "tanggallahir" class="form-control pull-right" id="datepicker">
                </div>
                <div class="row">
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jabatan</label>
                         <select name="jabatan" class='form-control'>
                           <?php 

                $sql = $this->db->get('jabatan');
                foreach ($sql->result() as $key => $value) {
                  ?>
                            <option value='<?php echo $value->jabatan ?>'><?php echo $value->jabatan ?> </option>
                          

                  <?php
                }

               ?>

                        </select>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <div class="form-group">
                        <label>Golongan</label>
                         <select name="namagolongan" class='form-control'>
                            <?php 

                $sql = $this->db->get('golongan');
                foreach ($sql->result() as $key => $value) {
                  ?>
                            <option value='<?php echo $value->pangkat ?>'><?php echo $value->pangkat ?> </option>
                          

                  <?php
                }

               ?>
                            </select>
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select name = "agama" class="form-control">
                    <option value ="islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter ..." >
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name = "password" placeholder="Enter ..." >
                </div>
                
                  <div class="form-group">
                      <label>Foto</label>
                         <input type="file" class="form-control" name="foto" required="required" />
                  </div>
                
                <div class="form-group">
                  <label>Akses</label>
                  <select name = "akses" class="form-control">
                    <option value="Administrator">admin</option>
                    <option value="TU">TU</option>
                    <option value="Kasi">Kasi</option>
                    <option value="Pegawai">Pegawai</option>
                    
                  </select>
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