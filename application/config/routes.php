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

$route['wilayah/kabupaten'] = 'wilayah/kabupaten';
$route['wilayah/kecamatan'] = 'wilayah/kecamatan';

$route['pegawai/lhp/tambah']              = 'pegawai/Pegawai/inputLhp';
$route['pegawai/lhp/lihat/(:any)']        = 'pegawai/Pegawai/lihatLhp/$1';
$route['pegawai/lhp/edit/(:any)']         = 'pegawai/Pegawai/editLhp/$1';
$route['pegawai/lhp/hapus/(:any)/(:any)'] = 'pegawai/Pegawai/hapusLhp/$1/$2';
$route['pegawai/lhp/cetak/(:any)']        = 'pegawai/Pegawai/cetakLhp/$1';