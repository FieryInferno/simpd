<font face="calibri" size = "6" color="black">Selamat Datang <?php echo $_SESSION['nama'] ;?></font>
<div class="box">
  <div class="box-header with-border">
    <font face="calibri" size="5" color="black"><h2 class="box-title">Edit LHP</h2></font>
  </div>
  <div class="box-body">
    <form role="form" enctype ="multipart/form-data" method = "post" action ="<?php echo base_url('pegawai/lhp/edit/' . $id_lhp);?>" >
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nomor SPD</label>
            <input type="text" class="form-control" value="<?= $nomor_spd; ?>" readonly>
            <input type="hidden" name="id_spd" value="<?= $id_spd; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Kegiatan</label>
            <input type="text" class="form-control" name="kegiatan" placeholder="" value="<?= $kegiatan; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Jam</label>
            <input type="text" class="form-control" name="jam" placeholder="" value="<?= $jam; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Bukti</label>
            <input type="file" class="form-control" name="bukti_kegiatan" placeholder="" >
            <input type="hidden" name="bukti_kegiatan_lama" value="<?= $bukti_kegiatan; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Masalah</label>
            <input type="text" class="form-control" name="permasalahan" placeholder="" value="<?= $permasalahan; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Solusi</label>
            <input type="text" class="form-control" name="solusi" placeholder="" value="<?= $solusi; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="" value="<?= $keterangan; ?>">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label></label>
            <input type="hidden" class="form-control" rows="3" name="id_pegawai" value = "<?php echo $_SESSION['id'] ?>" placeholder=""></textarea>
          </div>
        </div>  
      </div> 
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  value="SIMPAN"class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>