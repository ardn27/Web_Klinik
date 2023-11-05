<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserKlinikController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SpesialisAnakController;
use App\Http\Controllers\SpesialisKandunganController;
use App\Http\Controllers\ResepController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//userklinik controller

Route::get('/home', [UserKlinikController::class, 'index']);
Route::get('/registrasi', [UserKlinikController::class, 'registrasion']);
Route::get('/antrian',[UserKlinikController::class, 'antri']);
Route::get('/profile/{id}', [UserController::class, 'userProfile']);

Route::get('/login', [UserController::class, 'indexLogin']);
Route::post('/login-aksi',[UserController::class, 'auth']);
Route::get('/form-regis', [UserController::class, 'index']);
Route::post('/form-regis-aksi',[UserController::class, 'register']);
Route::get('/logout-user', [UserController::class, 'logout']);

Route::get('/index-pasien', [UserKlinikController::class, 'indexPasien']);
Route::get('/edit-pasien/{id}', [UserKlinikController::class, 'editPasien']);

// fungsi
Route::get('/add-pasien', [UserKlinikController::class, 'create']);
Route::get('/pasien-edit', [UserKlinikController::class, 'edit']);
Route::get('/delete-pasien/{id}', [UserKlinikController::class, 'delete']);

//dokter controller
Route::get('/add-dokter',[DokterController::class, 'AddDokter']);
Route::get('/edit-dokter/{id}', [DokterController::class, 'EditDokter']);
Route::get('/index-dokter', [DokterController::class, 'IndexDokter']);
Route::get('/login-dokter', [DokterController::class, 'LoginDokter']);
Route::post('/login-dokter-aksi', [DokterController::class, 'login']);
Route::get('/home-view-dokter', [DokterController::class, 'indexHomeDokter']);

//fungsi
Route::get('/add', [DokterController::class, 'DokterAdd']);
Route::get('/edit', [DokterController::class, 'DokterEdit']);
Route::get('/delete/{id}', [DokterController::class, 'DokterDelete']);


//Obat Controller

Route::get('/indexObat', [ObatController::class, 'obatIndex']);
Route::get('/addObat', [ObatController::class, 'tambahObat']);
Route::get('/obatEdit/{id}', [ObatController::class, 'editObat']);

//fungsi
Route::get('/add-obat',[ObatController::class, 'tambah']);
Route::get('/edit-obat', [ObatController::class, 'edit']);
Route::get('/delete/{id}', [ObatController::class, 'deleteObat']);

//Resep Controller
Route::get('/index-resep', [ResepController::class, 'resepIndex']);
Route::get('/tambah-resep', [ResepController::class, 'tambahResep']);
Route::get('/edit-resep/{id}', [ResepController::class, 'editResep']);

//fungsi ResepController
Route::get('/resep-add', [ResepController::class, 'addResep']);
Route::get('/resep-edit', [ResepController::class, 'edit']);
Route::get('/resep-delete/{id}',[ResepController::class, 'deleteResep']);

//Tindakan Controllers dokter umum
Route::get('/tindakan-index', [TindakanController::class, 'TindakanIndex']);
Route::get('/tindakan-add', [TindakanController::class, 'TindakanAdd']);
Route::get('/tindakan-add-action', [TindakanController::class, 'addTindakan']);
Route::get('/tindakan-edit/{id}', [TindakanController::class, 'TindakanEdit']);
Route::get('/tindakan-edit-action', [TindakanController::class, 'editTindakan']);
Route::get('/tindakan-delete/{id}', [TindakanController::class, 'deleteTindakan']);
Route::get('/login-umum',[TindakanController::class,'LoginUmum']);
Route::post('/login-umum-aksi', [TindakanController::class, 'login']);
Route::get('/logout-umum', [TindakanController::class. 'logout']);

//Tindakan Controllers dokter spesialis anak
Route::get('/tindakan-anak-index', [SpesialisAnakController::class, 'TindakanIndexAnak']);
Route::get('/tindakan-anak-add', [SpesialisAnakController::class, 'TindakanAddAnak']);
Route::get('/tindakan-anak-add-action', [SpesialisAnakController::class, 'addTindakanAnak']);
Route::get('/tindakan-anak-edit/{id}', [SpesialisAnakController::class, 'TindakanEditAnak']);
Route::get('/edit-anak-action', [SpesialisAnakController::class, 'editTindakanAnak']);
Route::get('/delete-tindakan-anak/{id}', [SpesialisAnakController::class, 'deleteTindakanAnak']);
Route::get('/login-sp-anak', [SpesialisAnakController::class,'LoginSpAnak']);
Route::post('/login-sp-anak-aksi', [SpesialisAnakController::class, 'loginSp']);
Route::get('/logout-sp-anak', [SpesialisAnakController::class, 'logout']);

//Tindakan Controlllers dokter spesialis kandungan
Route::get('/tindakan-kandungan-index', [SpesialisKandunganController::class, 'TindakanIndex']);
Route::get('/tindakan-kandungan-add', [SpesialisKandunganController::class, 'TindakanAdd']);
Route::get('/tindakan-kandungan-edit/{id}', [SpesialisKandunganController::class, 'TindakanEditKandungan']);
Route::get('/edit-kandungan-action', [SpesialisKandunganController::class, 'editTindakan']);
Route::get('/delete-kandungan/{id}', [SpesialisKandunganController::class, 'deleteTindakan']);
Route::get('/kandungan-add-action', [SpesialisKandunganController::class, 'addTindakan']);
Route::get('/login-sp-kandungan', [SpesialisKandunganController::class,'LoginSpKandungan']);
Route::post('/login-sp-kandungan-aksi', [SpesialisKandunganController::class, 'loginKandungan']);
Route::get('/logout-sp-kandungan', [SpesialisKandunganController::class, 'Logout']);
