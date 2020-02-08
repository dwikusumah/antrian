<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_Landing';
$route['TentangAplikasi'] = 'C_TentangAplikasi';
$route['LandingPage'] = 'C_Landing/index';
$route['LandingPage/(:any)'] = 'C_Landing/$1';
$route['LandingPage/(:any)/(:any)'] = 'C_Landing/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Admin Stuff*/
$route['DashboardAdmin'] = 'Admin/C_Dashboard';
$route['Admin'] = 'Admin/C_Pegawai/';
$route['Admin/(:any)'] = 'Admin/C_Pegawai/$1';
$route['Admin/(:any)/(:any)'] = 'Admin/C_Pegawai/$1/$2';

$route['Generate'] = 'C_Generate/index';
$route['Login'] = 'C_Login/index';
$route['Login/(:any)'] = 'C_Login/$1';
$route['Login/(:any)/(:any)'] = 'C_Login/$1/$2';

$route['Login_c'] = 'C_Login_c/index';
$route['Login_c/(:any)'] = 'C_Login_c/$1';
$route['Login_c/(:any)/(:any)'] = 'C_Login_c/$1/$2';

$route['Login_Staff'] = 'C_Login_Staff/index';
$route['Login_Staff/(:any)'] = 'C_Login_Staff/$1';
$route['Login_Staff/(:any)/(:any)'] = 'C_Login_Staff/$1/$2';

$route['Cart'] = 'Kasir/Cart';

$route['DataBarang'] = 'Admin/C_DataBarang/';
$route['DataBarang/(:any)'] = 'Admin/C_DataBarang/$1';
$route['DataBarang/(:any)/(:any)'] = 'Admin/C_DataBarang/$1/$2';

$route['User'] = 'Admin/C_User/';
$route['User/(:any)'] = 'Admin/C_User/$1';
$route['User/(:any)/(:any)'] = 'Admin/C_User/$1/$2';

$route['DataTransaksi'] = 'Admin/C_DataTransaksi/';
$route['DataTransaksi/(:any)'] = 'Admin/C_DataTransaksi/$1';
$route['DataTransaksi/(:any)/(:any)'] = 'Admin/C_DataTransaksi/$1/$2';

$route['Jamkes'] = 'Admin/C_Jamkes/';
$route['Jamkes/(:any)'] = 'Admin/C_Jamkes/$1';
$route['Jamkes/(:any)/(:any)'] = 'Admin/C_Jamkes/$1/$2';

$route['Antrian'] = 'Admin/C_Antrian/';
$route['Antrian/(:any)'] = 'Admin/C_Antrian/$1';
$route['Antrian/(:any)/(:any)'] = 'Admin/C_Antrian/$1/$2';

$route['Barang'] = 'Admin/C_Barang/';

$route['Hubungi'] = 'Admin/C_Hubungi/';
$route['Hubungi/(:any)'] = 'Admin/C_Hubungi/$1';
$route['Hubungi/(:any)/(:any)'] = 'Admin/C_Hubungi/$1/$2';

$route['PetunjukAdmin'] = 'Admin/C_PetunjukAdmin';

$route['ProfilAdmin'] = 'Admin/C_ProfilAdmin';

$route['PengaturanAdmin'] = 'Admin/C_PengaturanAdmin';

$route['Keluar'] = 'C_Keluar';


/* Main Menu Stuff */
$route['Daftar'] = 'C_Daftar/index';
$route['Daftar/(:any)'] = 'C_Daftar/$1';
$route['Daftar/(:any)/(:any)'] = 'C_Daftar/$1/$2';

$route['JadwalStaff'] = 'C_MainMenu/jadwal';
$route['DaftarStaff'] = 'C_MainMenu/staff';
$route['DaftarLayanan'] = 'C_MainMenu/layanan';
$route['getAntrian'] = 'C_Landing/getAntrian';
	