<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'c_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['tata_usaha/spd']              = 'tata_usaha/Spd';
$route['tata_usaha/spd/tambah']       = 'tata_usaha/Spd/tambah';
$route['tata_usaha/spd/upload']       = 'tata_usaha/Spd/upload';
$route['tata_usaha/spd/edit/(:any)']  = 'tata_usaha/Spd/edit/$1';
$route['tata_usaha/spd/hapus/(:any)'] = 'tata_usaha/Spd/hapus/$1';
$route['tata_usaha/lhp']              = 'tata_usaha/Lhp';
$route['tata_usaha/lhp/lihat/(:any)'] = 'tata_usaha/Lhp/lihat/$1';
$route['tata_usaha/lhp/cetak/(:any)'] = 'tata_usaha/Lhp/cetak/$1';

$route['wilayah/kabupaten'] = 'wilayah/kabupaten';
$route['wilayah/kecamatan'] = 'wilayah/kecamatan';

$route['pegawai/lhp/tambah']                          = 'pegawai/Pegawai/inputLhp';
$route['pegawai/lhp/lihat/(:any)']                    = 'pegawai/Pegawai/lihatLhp/$1';
$route['pegawai/lhp/edit/(:any)']                     = 'pegawai/Pegawai/editLhp/$1';
$route['pegawai/lhp/hapus/(:any)/(:any)']             = 'pegawai/Pegawai/hapusLhp/$1/$2';
$route['pegawai/lhp/cetak/(:any)']                    = 'pegawai/Pegawai/cetakLhp/$1';
$route['pegawai/tingkat']                             = 'pegawai/Pegawai/tingkat';
$route['pegawai/realisasi_biaya']                     = 'pegawai/RealisasiBiaya';
$route['pegawai/realisasi_biaya/detail/(:any)']       = 'pegawai/RealisasiBiaya/detail/$1';
$route['pegawai/realisasi_biaya/edit/(:any)/(:any)']  = 'pegawai/RealisasiBiaya/edit/$1/$2';
$route['pegawai/realisasi_biaya/hapus/(:any)/(:any)'] = 'pegawai/RealisasiBiaya/hapus/$1/$2';
$route['pegawai/realisasi_biaya/cetak/(:any)']        = 'pegawai/RealisasiBiaya/cetak/$1';