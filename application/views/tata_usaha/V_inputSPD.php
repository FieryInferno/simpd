<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="box">
  <div class="box-header with-border">
    <font face="calibri" size="5" color="black"><h2 class="box-title">Tambah SPD</h2></font>
  </div>
  <div class="box-body">
    <form role="form" enctype ="multipart/form-data" method= "post" action ="<?= base_url(); ?>tata_usaha/spd/tambah">
      <div class="form-group">
        <label>Nomor</label>
        <input type="text" name="nomor_spd" value = "<?php echo sprintf("%03s", $id_spd)."/"."SPD"."/"."BPS"."/"."3213"."/".date('m')."/".date('Y') ?>" class="form-control" >
      </div>
      <div class="form-group">
        <label>Nama Pegawai</label>
        <select name="id_pegawai" class='form-control js-example-basic-single' onchange="pilihTingkat(this)">
          <option>Pilih Pegawai</option>
          <?php
            foreach ($pegawai as $key) { ?>  
              <option value='<?= $key['id']; ?>'><?= $key['nip'] . ' - ' . $key['nama'] ?></option>
            <?php } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Tujuan</label>
        <textarea class="form-control" name ="tujuan" rows="3" placeholder="Enter ..."></textarea>
      </div>
      <div class="form-group">
        <label>Kendaraan</label>
        <select name="kendaraan" class='form-control js-example-basic-single'>
          <option>Pilih Kendaraan</option>
          <option>Kendaraan Dinas</option>
          <option>Kendaraan Pribadi</option>
          <option>Kendaraan Umum</option>
        </select>
      </div>
      <div class="form-group">
        <label>Tempat Berangkat</label><br/>
        <label for="">Provinsi</label>
        <select name="tempat_berangkat_provinsi" id="" onchange="pilihProvinsi(this)" class="form-control js-example-basic-single">
          <option>Pilih Provinsi</option>
          <?php
            foreach ($provinsi as $key) { ?>
              <option value="<?= $key['id']; ?>"><?= $key['nama']; ?></option>
            <?php }
          ?>
        </select>
        <label for="">Kabupaten</label>
        <select name="tempat_berangkat_kabupaten" id="tempat_berangkat_kabupaten" onchange="pilihKabupaten(this)" class="form-control js-example-basic-single">
          <option>Pilih Kabupaten</option>
        </select>
        <label for="">Kecamatan</label>
        <select name="tempat_berangkat_kecamatan" id="tempat_berangkat_kecamatan" class="form-control js-example-basic-single">
          <option>Pilih Kecamatan</option>
        </select>
      </div>
      <div class="form-group">
        <label>Tempat Tujuan</label><br/>
        <label for="">Provinsi</label>
        <select name="tempat_tujuan_provinsi" id="" onchange="pilihProvinsi(this, 'tujuan')" class="form-control js-example-basic-single">
          <option>Pilih Provinsi</option>
          <?php
            foreach ($provinsi as $key) { ?>
              <option value="<?= $key['id']; ?>"><?= $key['nama']; ?></option>
            <?php }
          ?>
        </select>
        <label for="">Kabupaten</label>
        <select name="tempat_tujuan_kabupaten" id="tempat_tujuan_kabupaten" onchange="pilihKabupaten(this, 'tujuan')" class="form-control js-example-basic-single">
          <option>Pilih Kabupaten</option>
        </select>
        <label for="">Kecamatan</label>
        <select name="tempat_tujuan_kecamatan" id="tempat_tujuan_kecamatan" class="form-control js-example-basic-single">
          <option>Pilih Kecamatan</option>
        </select>
      </div>
      <div class="form-group">
        <label>Tanggal Berangkat</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="date" name="tanggalBerangkat" class="form-control pull-right" id="datepicker">
        </div>
      </div>
      <div class="form-group">
        <label>Tanggal Kembali</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="date" name="tanggalKembali" class="form-control pull-right" id="datepicker">
        </div>
      </div>
      <div class="form-group">
        <label>Pengikut 1</label>
        <select name="pengikut_1" class='form-control js-example-basic-single'>
          <option>Pilih Pegawai</option>
          <?php
            foreach ($pegawai as $key) { ?>  
              <option value='<?= $key['id']; ?>'><?= $key['nip'] . ' - ' . $key['nama'] ?></option>
            <?php } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Pengikut 2</label>
        <select name="pengikut_2" class='form-control js-example-basic-single'>
          <option>Pilih Pegawai</option>
          <?php
            foreach ($pegawai as $key) { ?>  
              <option value='<?= $key['id']; ?>'><?= $key['nip'] . ' - ' . $key['nama'] ?></option>
            <?php } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Pengikut 3</label>
        <select name="pengikut_3" class='form-control js-example-basic-single'>
          <option>Pilih Pegawai</option>
          <?php
            foreach ($pegawai as $key) { ?> 
              <option value='<?= $key['id']; ?>'><?= $key['nip'] . ' - ' . $key['nama'] ?></option>
            <?php } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Tingkat Biaya</label>
        <input type="text" name="tingkat_biaya" class="form-control" readonly id="tingkat_biaya">
      </div>
      <div class="form-group">
        <label>Kegiatan</label>
        <select name="id_kegiatan" class='form-control'>
          <option>Pilih Kegiatan</option>
          <?php
            foreach ($kegiatan as $key) { ?>  
              <option value='<?= $key['id_kegiatan']; ?>'><?= $key['nama_kegiatan'] ?></option>
            <?php } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Komponen</label>
        <select name="id_komponen" class='form-control'>
          <option>Pilih Komponen</option>
          <?php
            foreach ($komponen as $key) { ?>  
              <option value='<?= $key['id_komponen']; ?>'><?= $key['nama_komponen'] ?></option>
            <?php } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Program</label>
        <select name="id_anggaran" class='form-control'>
          <option>Pilih Anggaran</option>
          <?php
            foreach ($anggaran as $key) { ?>  
              <option value='<?= $key['id_anggaran']; ?>'><?= $key['nomor_anggaran'] ?></option>
            <?php } 
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <textarea type="text" name="keterangan" class="form-control" placeholder="Enter ..." rows="3" ></textarea>
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
</div>