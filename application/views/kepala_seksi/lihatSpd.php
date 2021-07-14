<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="box">
  <div class="box-header with-border">
    <font face="calibri" size="5" color="black"><h2 class="box-title">Detail SPD</h2></font>
  </div>
  <div class="box-body">
    <form>
      <div class="form-group">
        <label>Nomor</label>
        <input type="text" name="nomor_spd" value="<?= $nomor_spd; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Bagian</label>
        <input type="text" name="nomor_spd" value="<?= $bagian; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Nama Pegawai</label>
        <input type="text" name="nomor_spd" value="<?= $pegawai['nama']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Tujuan</label>
        <input type="text" name="nomor_spd" value="<?= $tujuan; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Kendaraan</label>
        <input type="text" name="nomor_spd" value="<?= $kendaraan; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Tempat Berangkat</label><br/>
        <label for="">Provinsi</label>
        <input type="text" name="nomor_spd" value="<?= $provinsi_berangkat['nama']; ?>" class="form-control" readonly>

        <label for="">Kabupaten</label>
        <input type="text" name="nomor_spd" value="<?= $kabupaten_berangkat['nama']; ?>" class="form-control" readonly>

        <label for="">Kecamatan</label>
        <input type="text" name="nomor_spd" value="<?= $kecamatan_berangkat['nama']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Tempat Tujuan</label><br/>
        <label for="">Provinsi</label>
        <input type="text" name="nomor_spd" value="<?= $provinsi_tujuan['nama']; ?>" class="form-control" readonly>

        <label for="">Kabupaten</label>
        <input type="text" name="nomor_spd" value="<?= $kabupaten_tujuan['nama']; ?>" class="form-control" readonly>

        <label for="">Kecamatan</label>
        <input type="text" name="nomor_spd" value="<?= $kecamatan_tujuan['nama']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Tanggal Berangkat</label>
        <input type="text" name="nomor_spd" value="<?= $tanggalBerangkat; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="text" name="nomor_spd" value="<?= $tanggalKembali; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Pengikut 1</label>
        <input type="text" name="nomor_spd" value="<?= isset($pegawai1['nama']) ? $pegawai1['nama'] : '' ; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Pengikut 2</label>
        <input type="text" name="nomor_spd" value="<?= isset($pegawai2['nama']) ? $pegawai2['nama'] : '' ; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Pengikut 3</label>
        <input type="text" name="nomor_spd" value="<?= isset($pegawai3['nama']) ? $pegawai3['nama'] : '' ; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label></label>
        <input type="text" name="nomor_spd" value="<?= $tingkat_biaya; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Kegiatan</label>
        <input type="text" name="nomor_spd" value="<?= $kegiatan['nama_kegiatan']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Komponen</label>
        <input type="text" name="nomor_spd" value="<?= $komponen['nama_komponen']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="nomor_spd" value="<?= $keterangan; ?>" class="form-control" readonly>
      </div>
    </form>
  </div>
</div>