<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// login dan logout
$route['login']			= 'Auth/login';
$route['loginAksi']		= 'Auth/loginAksi';
$route['daftar']		= 'Auth/daftar';
$route['daftarAksi']	= 'Auth/daftarAksi';
$route['lupaPass']		= 'Auth/lupaPass';
$route['verifikasiDaftar/(:any)/(:any)'] = 'Auth/verifikasiDaftar/$1/$2';

// home
$route['home'] 			= 'Dashboard/tampilDashboard';

// profile
$route['profile'] 		= 'Home/Profile/tampilProfile';
$route['profile/editFotoProfile/(:num)'] = 'Home/Profile/editFotoProfile/$1';
$route['profile/editDataProfile/(:num)'] = 'Home/Profile/editDataProfile/$1';
$route['settingProfile'] = 'Home/Profile/setting';
$route['settingProfileAksi'] = 'Home/Profile/settingAksi';

// menu barang
$route['barang'] = 'Home/Barang/tampilDataBarang';
$route['tambahBarang'] = 'Home/Barang/tambahDataBarang';
$route['editBarang/(:num)'] = 'Home/Barang/editDataBarang/$1';
$route['hapusBarang/(:num)'] = 'Home/Barang/hapusDataBarang/$1';
$route['hapusAllBarang'] = 'Home/Barang/hapusBarangAll';
$route['printDataBarang'] = 'Home/Barang/printDataBarang';
$route['kategoriBarang'] = 'Home/Barang/tampilKategoriBarang';
$route['tambahKategori'] = 'Home/Barang/tambahKategoriBarang';
$route['editKategori/(:num)'] = 'Home/Barang/editKategoriBarang/$1';
$route['hapusKategori/(:num)'] = 'Home/Barang/hapusKategoriBarangAksi/$1';
$route['hapusAllKategori'] = 'Home/Barang/hapusKategoriAll';
$route['suplier'] = 'Home/Barang/tampilSuplier';
$route['tambahSuplier'] = 'Home/Barang/tambahDataSuplier';
$route['editSuplier/(:num)'] = 'Home/Barang/editDataSuplier/$1';
$route['hapusSuplier/(:num)'] = 'Home/Barang/hapusDataSuplier/$1';
$route['hapusAllSuplier'] = 'Home/Barang/hapusSuplierAll';
$route['satuan'] = 'Home/Barang/tampilSatuan';
$route['tambahSatuan'] = 'Home/Barang/tambahDataSatuan';
$route['editSatuan/(:num)'] = 'Home/Barang/editDataSatuan/$1';
$route['hapusSatuan/(:num)'] = 'Home/Barang/hapusDataSatuan/$1';
$route['hapusAllSatuan'] = 'Home/Barang/hapusSatuanAll';
$route['dataPerusahaan'] = 'Home/Barang/tampilProfilPerusahaan';
$route['tambahPerusahaan'] = 'Home/Barang/tambahProfilPerusahaan';
$route['editPerusahaan/(:num)'] = 'Home/Barang/editProfilPerusahaan/$1';
$route['hapusPerusahaan/(:num)'] = 'Home/Barang/hapusProfilPerusahaan/$1';
$route['hapusAllPerusahaan'] = 'Home/Barang/hapusPerusahaanAll';

// transaksi
$route['tambahTransaksi'] = 'Home/Transaksi/tambahDataTransaksi';
$route['tambahTansaksiAksi'] = 'Home/Transaksi/tambahDataTransaksiAksi';
$route['listTransaksi'] = 'Home/Transaksi/listTransaksi';
$route['ajaxLoad/(:any)'] = 'Home/Transaksi/viewList/$1';
$route['filterListInput'] = 'Home/Transaksi/filterList';
$route['tampilFilter/(:any)/(:any)'] = 'Home/Transaksi/tampilFilter/$1/$2';
$route['hapusAllTransaksi'] = 'Home/Transaksi/hapusTransaksiAll';

// menu management
$route['managementKonfig'] = 'Home/ManagementUsers/tampilKonfig';
$route['editKonfigAksi/(:num)'] = 'Home/ManagementUsers/editKonfigAksi/$1';
$route['viewUser'] = 'Home/ManagementUsers/viewUser';
$route['dataUser'] = 'Home/ManagementUsers/tampil_data_user';
$route['editStatusUser/(:num)'] = 'Home/ManagementUsers/editStatusUser/$1';
$route['editBlokirUser'] = 'Home/ManagementUsers/editBlokirUser';
$route['daftarUserAksi'] = 'Home/ManagementUsers/daftarUserAksi';
$route['editDataUserAksi/(:num)'] = 'Home/ManagementUsers/editUserAksi/$1';
$route['hapusDataUserAksi/(:num)'] = 'Home/ManagementUsers/hapusUserAksi/$1';
$route['managementAgent'] = 'Home/ManagementUsers/tampilAgent';
$route['managementMenu'] = 'Home/ManagementUsers/tampilMenu';
$route['editStatusMenu/(:num)'] = 'Home/ManagementUsers/editStatusMenu/$1';
$route['editStatusSubmenu/(:num)'] = 'Home/ManagementUsers/editStatusSubmenu/$1';
$route['editStatusUrut/(:num)'] = 'Home/ManagementUsers/editStatusUrut/$1';
$route['editStatusUrutSub/(:num)'] = 'Home/ManagementUsers/editStatusUrutSub/$1';
$route['editStatusLevel/(:num)'] = 'Home/ManagementUsers/editStatusLevel/$1';
$route['editMenu/(:num)'] = 'Home/ManagementUsers/editMenu/$1';



$route['home/logout']	= 'Auth/logout';

// default
$route['default_controller'] = 'Auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
