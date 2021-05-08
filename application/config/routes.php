<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'c_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['tata_usaha/spd']        = 'tata_usaha/Spd';
$route['tata_usaha/spd/tambah'] = 'tata_usaha/Spd/tambah';
$route['tata_usaha/spd/upload'] = 'tata_usaha/Spd/upload';

$route['wilayah/kabupaten'] = 'wilayah/kabupaten';
$route['wilayah/kecamatan'] = 'wilayah/kecamatan';
