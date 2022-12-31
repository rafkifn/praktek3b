<?php


use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TampilController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PeminjamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('/auth/login');
});

Route::group(['middleware' => 'revalidate'], function()
{
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('is_admin');
Route::get('/info', [App\Http\Controllers\HomeController::class, 'info'])->name('info');
Route::get('/v_peminjaman', [App\Http\Controllers\PeminjamController::class, 'peminjaman'])->name('v_peminjaman');
Route::get('/v_transaksi', [App\Http\Controllers\PeminjamController::class, 'transaksi'])->name('v_transaksi');
Route::get('/v_pengembalian', [App\Http\Controllers\PeminjamController::class, 'pengembalian'])->name('v_pengembalian');
Route::get('/laporan', [App\Http\Controllers\PeminjamController::class, 'laporan'])->name('laporan');
Route::get('/ubah_status/{id}', [App\Http\Controllers\PeminjamController::class, 'ubah_status']);
Route::get('/status/{id}', [App\Http\Controllers\PeminjamController::class, 'status']);
Route::get('/keterangan/{id}', [App\Http\Controllers\PeminjamController::class, 'keterangan']);
Route::get('/v_datauser', [App\Http\Controllers\HomeController::class, 'datauser'])->name('v_datauser');

//crud
Route::get('/index', [App\Http\Controllers\BukuController::class, 'index'])->name('index');
Route::get('/create', [BukuController::class,'create']);
// Route::get('/edit', [BukuController::class,'edit']);
Route::resource('bukuu',BukuController::class); 
// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//crudModal
Route::post('/index', [App\Http\Controllers\PeminjamController::class, 'index'])->name('index');
Route::get('/destroy/{id}', [App\Http\Controllers\PeminjamController::class, 'destroy'])->name('destroy');
Route::post('/create', [PeminjamController::class,'create']);
Route::resource('peminjam',PeminjamController::class);

Route::get('/cetak', [App\Http\Controllers\SiteController::class, 'cetak'])->name('cetak');



// Auth::routes();

Auth::routes();

Route::group(['middleware'=>['verified']],function() {
// Route::get('/', [App\Http\Controllers\SiteController::class, 'bizz'])->name('bizz');
Route::get('/indexx', [App\Http\Controllers\SiteController::class, 'indexx'])->name('indexx');

Route::get('/modal', [App\Http\Controllers\HomeController::class, 'modal'])->name('modal');
});


Route::get('/v_home2', [App\Http\Controllers\HomeController::class, 'h2'])->name('v_home2');

// Route::get('/v_home2', 'HomeController@h2')->name('v_home2');

// Route::get('/peminjaman', 'HomeController@peminjaman')->name('v_peminjaman');

// Route::get('/ubah_status/{id}', 'PeminjamController@ubah_status');
Route::get('/v_databuku', [App\Http\Controllers\HomeController::class, 'databuku'])->name('v_databuku');

Route::get('/v_detail/{id}', [App\Http\Controllers\SiteController::class, 'detail'])->name('v_detail');
//Route::get('/v_detail', [App\Http\Controllers\SiteController::class, 'tampildetail'])->name('v_detail');
Route::get('/book', [App\Http\Controllers\SiteController::class, 'book'])->name('book');
Route::get('/books', [App\Http\Controllers\SiteController::class, 'books'])->name('books');
// Route::resource('/books', TampilController::class);
Route::get('/categories', [App\Http\Controllers\SiteController::class, 'categories'])->name('categories');
Route::get('/developer', [App\Http\Controllers\SiteController::class, 'developer'])->name('developer');

Route::get('/dashboard/profile/index', [App\Http\Controllers\PeminjamController::class, 'profile'])->name('profile');

// Route::group(['middleware'=>['auth','level:admin']],function(){

// 	Route::get('/dashboard',function(){
// 	return view('dashboard');
// 	})->name('dashboard');

// });
// Route::group(['middleware'=>['auth','level:pelanggan']],function(){
// 	Route::get('/home',function(){
// 	return view('indexx');
// 	})->name('indexx');
	  
// });
});

