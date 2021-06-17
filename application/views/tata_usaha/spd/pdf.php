<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="assets/images/logobps.png" type="image/x-icon" />
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <!-- surat perjalanan dinas -->
  <!-- <table>
    <tr>
      <td width="150px" class="text-center">BADAN PUSAT STATISTIK</td>
      <td width="300px">&nbsp;</td>
      <td class="text-right" style="border-bottom: black;border-bottom-style: solid;">Nomor : <?= $this->input->post('nomor_spd'); ?></td>
    </tr>
    <tr>
      <td style="border-bottom: black;border-bottom-style: solid;" class="text-center">PROVINSI JAWA BARAT</td>
      <td>&nbsp;</td>
      <td>Lembar ke : </td>
    </tr>
  </table>
  <br>
  <center><div class="text-center"><strong>SURAT PERJALANAN DINAS</strong></div></center>
  <br>
  <table border="1" width="100%">
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>1. </td>
            <td style="padding-left:10px;"> Pejabat Pembuat Komitmen</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><strong><u><?= $ppk['nama']; ?></u></strong></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>2. </td>
            <td style="padding-left:10px;">Nama Pegawai yang Melaksanakan Perjalanan Dinas</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $pegawai['nama']; ?></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>3. </td>
            <td>
              <div>a. Pangkat dan Golongan</div>
              <div>b. Jabatan/Instansi</div>
              <div>c. Tingkat Biaya Perjalanan Dinas</div>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <div>a. <?= $pegawai['namagolongan']; ?></div>
        <div>b. <?= $pegawai['jabatan']; ?></div>
        <div>c. Tingkat <?= $this->input->post('tingkat_biaya'); ?></div>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>4. </td>
            <td style="padding-left:10px;"> Maksud Perjalanan Dinas</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $this->input->post('tujuan'); ?></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>5. </td>
            <td style="padding-left:10px;"> Alat Angkutan yang Dipergunakan</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $this->input->post('kendaraan'); ?></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>6. </td>
            <td>
              <div>a. Tempat Berangkat</div>
              <div>b. Tempat Tujuan</div>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <ol type="a">
          <li>Provinsi <?= $provinsi_berangkat['nama']; ?> Kabupaten <?= $kabupaten_berangkat['nama']; ?> Kecamatan <?= $kecamatan_berangkat['nama']; ?></li>
          <li>Provinsi <?= $provinsi_tujuan['nama']; ?> Kabupaten <?= $kabupaten_tujuan['nama']; ?> Kecamatan <?= $kecamatan_tujuan['nama']; ?></li>
        </ol>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>7. </td>
            <td>
              <div>a.Lamanya Perjalanan Dinas</div>
              <div>b.Tanggal Berangkat</div>
              <div>c.Tanggal Harus Kembali/Tiba Tempat Baru</div>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <div>a. <?= $lama_hari; ?></div>
        <div>b. <?= $this->input->post('tanggalBerangkat'); ?></div>
        <div>c. <?= $this->input->post('tanggalKembali'); ?></div>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>8. </td>
            <td>Pengikut</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              
              <div> 1. <?= $pegawai1['nama']; ?> </div>
              <div> 2. <?= $pegawai2['nama']; ?> </div>
              <div> 3. <?= $pegawai3['nama']; ?> </div>
              
            </td>
          </tr>
        </table>
      </td>

      <td width="60%" style="padding-left:10px;">
         <table>
          <tr>
            <td>Tanggal Lahir </td>
            
          </tr>
          <tr>
            <td>
              
              <div>  1. <?= $pegawai1['tanggallahir']; ?> </div>
            <div>    2. <?= $pegawai2['tanggallahir']; ?> </div>
              <div>  3. <?= $pegawai3['tanggallahir']; ?> </div>
              
            </td>
          </tr>
        </table>
      </td>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>9. </td>
            <td>Pembebanan Anggaran</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <div>Program</div>
              <div>Kegiatan</div>
              <div>Komponen</div>
              <div>a. Instansi</div>
              <div>b. Mata Anggaran</div>
            </td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;">
        <table>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <div>Program Penyediaan dan Pelayanan Informasi Statistik</div>
              <div> <?= $kegiatan['nama_kegiatan']; ?></div>
              <div><?= $komponen['nama_komponen']; ?></div>
              <div>a. Badan Pusat Statistik</div>
              <div>b. <?= $anggaran['nomor_anggaran']; ?></div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">
        <table>
          <tr>
            <td>10. </td>
            <td style="padding-left:10px;">Keterangan Lain - Lain</td>
          </tr>
        </table>
      </td>
      <td width="60%" style="padding-left:10px;"><?= $this->input->post('keterangan'); ?></td>
    </tr>
  </table>
  <table width="100%">
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;">
        <table width="100%">
          <tr>
            <td width="50%">Dikeluarkan di</td>
            <td width="50%">: Subang</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;border-bottom: black;border-bottom-style: solid;">
        <table width="100%">
          <tr>
            <td width="50%">Pada Tanggal</td>
            <td width="50%">: <?= date('d M Y'); ?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">Pejabat Pembuat Komitmen</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">BPS Kabupaten Subang</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center"><strong><u><?= $ppk['nama']; ?></u></strong></td>
    </tr>
    <tr>
      <td width="40%" style="padding-left:10px;">&nbsp;</td>
      <td width="60%" style="padding-left:10px;" class="text-center">NIP. <?= $ppk['nip']; ?></td>
    </tr>
  </table> 
  <div style="page-break-before: always;"></div>-->

  <!-- rincian biaya perjalanan dinas -->
  <!-- <center><div class="text-center"><strong>RINCIAN BIAYA PERJALANAN DINAS</strong></div></center>
  <div>Lampiran SPD Nomor : <?= $this->input->post('nomor_spd'); ?></div>
  <div>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $this->input->post('tanggalBerangkat'); ?></div>
  <br>
  <table class="table" border="1">
    <tr>
      <th width="5%">No</th>
      <th width="65%">Perincian Biaya</th>
      <th width="20%">Jumlah (Rp.)</th>
      <th width="20%">Keterangan</th>
    </tr>
    <tr>
      <td>1</td>
      <td>
        <div>Nama yang bertugas : <?= $pegawai['nama']; ?></div>
        <div>Pangkat/Golongan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['namagolongan']; ?></div>
        <div>Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai['jabatan']; ?></div>
        <div>Lamanya tugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $lama_hari; ?></div>
        <div>Pengikut&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai1['nama']; ?></div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai2['nama']; ?></div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $pegawai3['nama']; ?></div>
      </td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Biaya Transport : </td>
      <td>0,-</td>
      <td></td>
    </tr>
    <tr>
      <td>3</td>
      <td>Uang harian selama <?= $lama_hari; ?> hari x <?= "Rp " . number_format($uangHarian, 2, ',', '.'); ?></td>
      <td><?= 'Rp. ' . number_format($totalUangHarian, 2, ',', '.'); ?></td>
      <td></td>
    </tr>
    <tr>
      <td>4</td>
      <td>Uang saku fullday selama <?= $lama_hari; ?> hari x <?= "Rp " . number_format($uangFull, 2, ',', '.'); ?></td>
      <td><?= 'Rp. ' . number_format($totalUangFull, 2, ',', '.'); ?></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>Jumlah Rp.</td>
      <td><?= 'Rp. ' . number_format($totalUang, 2, ',', '.'); ?></td>
      <td></td>
    </tr>
    <tr>
      <td class="text-center" colspan="4">
        <?php
          function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
              $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
              $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
              $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
              $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
              $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
              $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
              $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
              $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
              $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
              $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
          }
        
          function terbilang($nilai) {
            if($nilai<0) {
              $hasil = "minus ". trim(penyebut($nilai));
            } else {
              $hasil = trim(penyebut($nilai));
            }     		
            return $hasil;
          }

          echo terbilang($totalUang);
        ?>
      </td>
    </tr>
  </table>
  
  <table width="100%">
    <tr>
      <td width="55%">&nbsp;</td>
      <td class="text-center">Subang, <?= date('d M Y'); ?></td>
    </tr>
    <tr>
      <td>Telah dibayar sejumlah : </td>
      <td>Telah menerima sejumlah uang sebesar : </td>
    </tr>
    <tr>
      <td style="font-size: 20px;"><strong><?= 'Rp. ' . number_format($totalUang, 2, ',', '.'); ?></strong></td>
      <td style="font-size: 20px;"><strong><?= 'Rp. ' . number_format($totalUang, 2, ',', '.'); ?></strong></td>
    </tr>
    <tr>
      <td>Lunas pada tanggal : </td>
      <td></td>
    </tr>
  </table>
  
  <table width="100%">
    <tr>
      <td class="text-center">Bendahara Pengeluaran</td>
      <td class="text-center">Yang menerima,</td>
    </tr>
    <tr>
      <td class="text-center">BPS Kabupaten Subang</td>
      <td></td>
    </tr>
    <tr>
      <td>
        <br><br><br>
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-center"><strong><u><?= $bendahara['nama']; ?></u></strong></td>
      <td class="text-center"><strong><u><?= $pegawai['nama']; ?></u></strong></td>
    </tr>
    <tr>
      <td class="text-center">NIP. <?= $bendahara['nip']; ?></td>
      <td class="text-center"><?= $pegawai['nip']; ?></td>
    </tr>
  </table>
  
  <hr>
  <div class="text-center"><strong>PERHITUNGAN SPD RAMPUNG</strong></div>
  <table width="100%">
    <tr>
      <td width="30%">Ditetapkan sejumlah</td>
      <td width="5%">Rp.</td>
      <td class="text-right" width="30%"><?= number_format($totalUang, 2, ',', '.'); ?></td>
      <td width="35%"></td>
    </tr>
    <tr>
      <td>Yang telah dibayar semula</td>
      <td>Rp.</td>
      <td class="text-right"><?= number_format($totalUang, 2, ',', '.'); ?></td>
      <td></td>
    </tr>
    <tr>
      <td>Sisa kurang/lebih</td>
      <td>Rp.</td>
      <td class="text-right" style="border-bottom: black;border-bottom-style: solid;">0,-</td>
      <td></td>
    </tr>
    <tr>
      <td>Jumlah</td>
      <td>Rp.</td>
      <td class="text-right"><?= number_format($totalUang, 2, ',', '.'); ?></td>
      <td></td>
    </tr>
  </table>
  <table width="100%">
    <tr>
      <td width="50%"></td>
      <td class="text-center" width="50%">A.N Kuasa Pengguna Anggaran</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">BPS Kabupaten Subang</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">Pejabat Pembuat Komitmen</td>
    </tr>
    <tr>
      <td></td>
      <td><br><br><br></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><strong><u><?= $ppk['nama']; ?></u></strong></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">NIP. <?= $ppk['nip']; ?></td>
    </tr>
  </table> 
  <div style="page-break-before: always;"></div>-->

  <!-- surat tugas -->
  <table width="100%">
    <tr>
      <td width="20%"><img src="<?php echo base_url();?>assets/images/logobps.png" alt="AdminLTE Logo" width="100%"></td>
      <td style="font-size: 23px;"><strong><i>BADAN PUSAT STATISTIK KABUPATEN SUBANG</i></strong></td>
    </tr>
  </table>
  <br><br>
  <center><div class="text-center" style="font-size: 18px;"><strong><u>SURAT-TUGAS</u></strong></div></center>
  <center><div class="text-center">Nomor : <?= $this->input->post('nomor_spd'); ?></div></center>
  <br>
  <div>Yang bertandatangan di bawah ini :</div>
  <br>
  <div class="text-center" style="font-size: 18px;"><strong>KEPALA BADAN PUSAN STATISTIK KABUPATEN SUBANG</strong></div>
  <br>
  <div>Memberikan Tugas Kepada : </div>
  <br>
  <table width="100%">
    <tr>
      <td width="23%">Nama</td>
      <td width="5%">:</td>
      <td>
        <div><?= $pegawai['nama']; ?></div>
      </td>
    </tr>
    <tr>
      <td>Pengikut</td>
      <td>:</td>
      <td>
        <div><?= $pegawai1['nama']; ?> </div>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>
        <div><?= $pegawai2['nama']; ?> </div>
        <div><?= $pegawai3['nama']; ?> </div>
      </td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td><?= $pegawai['jabatan']; ?></td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Tujuan</td>
      <td>:</td>
      <td><?= $this->input->post('tujuan'); ?></td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Waktu Pelaksanaan</td>
      <td>:</td>
      <td><?= $this->input->post('tanggalberangkat'); ?></td>
    </tr>
  </table>
  <br><br><br>
  <table width="100%">
    <tr>
      <td width="50%"></td>
      <td class="text-center" width="50%">Subang, <?= date('d M Y'); ?></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">KEPALA BADAN PUSAT STATISTIK</td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center">KABUPATEN SUBANG</td>
    </tr>
    <tr>
      <td></td>
      <td><br><br><br></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-center"><strong>(<?= $kepala['nama']; ?>)</strong></td>
    </tr>
  </table>
  <br><br><br>
  <br><br><br>
  <br><br><br>
  <div class="text-center"><strong>Jl. Aipda KS Tubun No.12, Cigadung, Kec. Subang, Kabupaten Subang, Jawa Barat 41211</strong></div>
  <div class="text-center">Website : www.subangkab.bps.go.id Email : bps3213@bps.go.id</div>
  <div style="page-break-before: always;"></div>

  <!-- kwitansi -->
  <!-- <table width="100%">
    <tr>
      <td width="20%"><img src="<?php echo base_url();?>assets/images/logobps.png" alt="AdminLTE Logo" width="100%"></td>
      <td style="font-size: 20px;" width="40%"><strong><i>BADAN PUSAT STATISTIK KABUPATEN SUBANG</i></strong></td>
      <td width="40%">
        <table width="100%">
          <tr>
            <td width="45%">Tahun Anggaran</td>
            <td width="10%">:</td>
            <td width="45%">2021</td>
          </tr>
          <tr>
            <td width="45%">Nomor Bukti</td>
            <td width="10%">:</td>
            <td width="45%"></td>
          </tr>
          <tr>
            <td width="45%">Mata Anggaran</td>
            <td width="10%">:</td>
            <td width="45%"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <br><br><br>
  <br><br>
  <center><div class="text-center" style="font-size: 25px;"><strong>KWITANSI</strong></div></center>
  <br><br><br>
  <table width="100%">
    <tr>
      <td width="40%">Sudah diterima dari</td>
      <td width="10%">:</td>
      <td>Kuasa Pengguna Anggaran BPS Kabupaten Subang</td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Uang sebesar</td>
      <td>:</td>
      <td><?= 'Rp. ' . number_format($totalUang, 2, ',', '.'); ?></td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Untuk pembayaran</td>
      <td>:</td>
      <td>Biaya perjalanan dinas</td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Berdasaran SPPD</td>
      <td>:</td>
      <td><?= $this->input->post('nomor_spd'); ?></td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Untuk perjalanan dinas dari</td>
      <td>:</td>
      <td>Provinsi <?= $provinsi_berangkat['nama']; ?> Kabupaten <?= $kabupaten_berangkat['nama']; ?> Kecamatan <?= $kecamatan_berangkat['nama']; ?></td>
    </tr>
    <tr>
      <td><br></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Terbilang</td>
      <td>:</td>
      <td><?= terbilang($totalUang); ?></td>
    </tr>
  </table>
  <br><br><br>
  <div>Lunas pada tanggal : </div>
  <table width="100%">
    <tr>
      <td></td>
      <td class="text-center">Setuju dibayar : </td>
      <td class="text-center">Subang, <?= date('d M Y'); ?></td>
    </tr>
    <tr>
      <td class="text-center">Bendahara Pengeluaran</td>
      <td class="text-center">Pejabat Pembuat Komitmen</td>
      <td class="text-center"></td>
    </tr>
    <tr>
      <td class="text-center">BPS Kabupaten Subang</td>
      <td class="text-center">BPS Kabupaten Subang</td>
      <td class="text-center">Diterima oleh,</td>
    </tr>
    <tr>
      <td class="text-center"><br><br><br></td>
      <td class="text-center"></td>
      <td class="text-center"></td>
    </tr>
    <tr>
      <td class="text-center"><strong><u><?= $bendahara['nama']; ?></u></strong></td>
      <td class="text-center"><strong><u><?= $ppk['nama']; ?></u></strong></td>
      <td class="text-center"><strong><u><?= $pegawai['nama']; ?></u></strong></td>
    </tr>
    <tr>
      <td class="text-center">NIP. <?= $bendahara['nip']; ?></td>
      <td class="text-center">NIP. <?= $ppk['nip']; ?></td>
      <td class="text-center">NIP. <?= $pegawai['nip']; ?></td>
    </tr>
  </table>

  <div style="page-break-before: always;"></div>
  <table width="100%" border="1">
    <tr>
      <td width="50%"></td>
      <td width="50%">
        <table width="100%">
          <tr>
            <td width="49%">Berangkat dari</td>
            <td width="1%">:</td>
            <td width="50%">BPS Kabupaten Subang</td>
          </tr>
          <tr>
            <td width="49%" colspan="2">(Tempat Kedudukan)</td>
          </tr>
          <tr>
            <td width="49%">Pada Tanggal</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%">Ke</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
        </table>
        <div class="text-center">A.n KEPALA BPS KABUPATEN SUBANG</div>
        <div class="text-center">Pejabat Pembuat Komitmen</div>
        <br><br><br>
        <div class="text-center"><strong><u><?= $ppk['nama']; ?></u></strong></div>
        <div class="text-center"><?= $ppk['nip']; ?></div>
      </td>
    </tr>
    <tr>
      <td width="50%">
        <table width="100%">
          <tr>
            <td width="49%">Berangkat dari</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%" colspan="2">(Tempat Kedudukan)</td>
          </tr>
          <tr>
            <td width="49%">Pada Tanggal</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%">Ke</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
        </table>
        <br><br><br><br><br><br><br>
      </td>
      <td width="50%">
        <table width="100%">
          <tr>
            <td width="49%">Berangkat dari</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%" colspan="2">(Tempat Kedudukan)</td>
          </tr>
          <tr>
            <td width="49%">Pada Tanggal</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%">Ke</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
        </table>
        <br><br><br><br><br><br><br>
      </td>
    </tr>
    <tr>
      <td width="50%">
        <table width="100%">
          <tr>
            <td width="49%">Berangkat dari</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%" colspan="2">(Tempat Kedudukan)</td>
          </tr>
          <tr>
            <td width="49%">Pada Tanggal</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%">Ke</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
        </table>
        <br><br><br><br><br><br><br>
      <td width="50%">
        <table width="100%">
          <tr>
            <td width="49%">Berangkat dari</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%" colspan="2">(Tempat Kedudukan)</td>
          </tr>
          <tr>
            <td width="49%">Pada Tanggal</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%">Ke</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
        </table>
        <br><br><br><br><br><br><br>
      </td>
    </tr>
    <tr>
      <td width="50%">
        <table width="100%">
          <tr>
            <td width="49%">Tiba Kembali di</td>
            <td width="1%">:</td>
            <td width="50%">BPS Kabupaten Subang</td>
          </tr>
          <tr>
            <td width="49%" colspan="2">(Tempat Kedudukan)</td>
          </tr>
          <tr>
            <td width="49%">Pada Tanggal</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
          <tr>
            <td width="49%">Ke</td>
            <td width="1%">:</td>
            <td width="50%"></td>
          </tr>
        </table>
        <div class="text-center">A.n KEPALA BPS KABUPATEN SUBANG</div>
        <div class="text-center">Pejabat Pembuat Komitmen</div>
        <br><br><br>
        <div class="text-center"><strong><u><?= $ppk['nama']; ?></u></strong></div>
        <div class="text-center"><?= $ppk['nip']; ?></div>
      </td>
      <td width="50%">
        <p class="text-justify">Telah diperiksa dengan keterangan bahwa Perjalanan tersebut di atas benar dilakukan atas perintahnya dan semata mata untuk kepentingan jabatan dalam waktu yang sesingkat singkatnya.</p>
        <div class="text-center">A.n KEPALA BPS KABUPATEN SUBANG</div>
        <div class="text-center">Pejabat Pembuat Komitmen</div>
        <br><br><br>
        <div class="text-center"><strong><u>M. Bagas Setia</u></strong></div>
        <div class="text-center">1234567890</div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        Catatan Lain - Lain :
        <div>&nbsp;</div> 
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <p><strong><u>Perhatian :</u></strong></p>
        <div>Pejabat yang berwengang menerbitkan SPPD Pegawai yang melakukan Perjalanan Dinas, para pejabat yang mengesahkan tanggal berangkat/iba serta Bendaharawan bertanggung jawab berdasarjan Peraturan Keuangan Negara, apabila Negara menderita rugi akibat kesalahan, kekeliruan, kealpaan (angka 8 lampiran Surat Edaran Menteri Keuangan tanggal 30 April 1984 Nomor 8 269/MK/1/1984 dan Surat Edaran Menteri Keuangan tanggal 23 Februari 1989 Noomor MK.03/1989 dan Surat Edaran Menterui.</div>
      </td>
    </tr>
  </table> -->
</body>
</html>