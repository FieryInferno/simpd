<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages']   = array();
$autoload['libraries']  = array('database','session','form_validation','pagination','cart', 'upload');
$autoload['drivers']    = array();
$autoload['helper']     = array('file','url','form','text','html');
$autoload['config']     = array();
$autoload['language']   = array();
$autoload['model']      = array('M_Pegawai','M_Jabatan','M_Golongan','M_SPD', 'M_Surattugas', 'M_Wilayah', 'M_SBM', 'M_Kegiatan', 'M_Anggaran','M_Komponen','M_Lhp');
