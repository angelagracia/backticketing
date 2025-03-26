<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicKategori;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitkerjaController;
use App\Http\Controllers\EmailUpdateController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileLoginController;
use App\Http\Controllers\UserPortalAuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route bagian kirim cepat
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/kirimcepat', [FrontendController::class, 'kirimcepat'])->name('kirimcepat');
Route::get('/input_form_kc', [FrontendController::class, 'input_form_kc'])->name('input_form_kc');
Route::post('/proses-simpan', [FrontendController::class, 'prosesSimpan'])->name('prosesSimpan');
Route::get('/ticket/{id}/detail_ticket_kc', [FrontendController::class, 'detail_ticket_kc'])
    ->name('detail_ticket_kc');

Route::get('/cari-ticket', [FrontendController::class, 'searchTicket'])->name('searchTicket');
Route::get('/cari-ticket', [FrontendController::class, 'searchTicketLogin'])->name('searchTicketLogin');




Route::get('/forgetpassword', [FrontendController::class, 'forgetpassword'])->name('forgetpassword');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// Route bagian login

Route::get('/home', [FrontendController::class, 'home'])->middleware(['auth', 'verified'])->name('home');
Route::get('/home/akun', [ProfileController::class, 'profile.edit'])
    ->name('profile.edit') 
    ->middleware(['auth', 'verified']);

Route::get('/home/profile', [FrontendController::class, 'profile'])
    ->name('profile') 
    ->middleware(['auth', 'verified']);

    Route::group(['prefix' => 'portal', 'middleware' => ['web']], function () {
        Route::get('/login-portal', [UserPortalAuthController::class, 'showLoginForm'])->name('user_portal.login');
        Route::post('/login-portal', [UserPortalAuthController::class, 'loginPortal'])->name('loginPortal');
        Route::post('/logout-portal', [UserPortalAuthController::class, 'logout'])->name('user_portal.logout');
    
        Route::middleware('auth:users_portal')->group(function () {
            Route::get('/backoffice', function () {
                return view('back.backoffice');
            })->name('user_portal.dashboard');
        });
    });
    





Route::get('/home/input_form', [FrontendController::class, 'input_form'])
    ->name('input_form')
    ->middleware(['auth', 'verified']);

Route::post('/simpan-login', [FrontendController::class, 'prosesSimpanLogin'])
->name('prosesSimpanLogin')
->middleware(['auth', 'verified']);

Route::get('/ticket/{id}/data_ticket_login', [FrontendController::class, 'data_ticket_login'])
    ->name('data_ticket_login')
    ->middleware(['auth', 'verified']);


// Route::get('/ticket/{id}/data_ticket_login', [FrontendController::class, 'data_ticket_login'])
//     ->name('data_ticket_login');

 Route::get('/ticket/{id}/detail', [FrontendController::class, 'show'])->name('detail_ticket_login');


// Route::get('/ticket/{id}/detail_ticket_kc', [FrontendController::class, 'detail_ticket_kc'])
//     ->name('detail_ticket_kc');


Route::get('/home/detail_ticket', [FrontendController::class, 'detail_ticket'])
    ->name('detail_ticket')
    ->middleware(['auth', 'verified']);
    

Route::get('/home/detail_ticket_closed', [FrontendController::class, 'detail_ticket_closed'])
    ->name('home.detail_ticket_closed')
    ->middleware(['auth', 'verified']);

Route::get('/home/faqs_login', [FrontendController::class, 'faqs_login'])
    ->name('faqs_login')
    ->middleware(['auth', 'verified']);

Route::get('/home/contact_login', [FrontendController::class, 'contact_login'])
    ->name('home.contact_login')
    ->middleware(['auth', 'verified']);

Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/home/ticket/{id}/edit', [FrontendController::class, 'edit'])->name('ticketlogin.edit');
Route::post('home/ticket/proseUpdate', [FrontendController::class, 'prosesUpdate'])->name('ticket.prosesUpdate');





Route::get('/dashboard', [DashboardController::class, 'index'])
    // ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('/dashboard', function () {
//     return view ('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/logout', [AuthController::class, 'logout']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/kategori', [TopicController::class, 'index'])->name('topic.index');
Route::get('/kategori/tambah', [TopicController::class, 'tambah'])->name('topic.tambah');
Route::post('/kategori/prosesTambah', [TopicController::class, 'prosesTambah'])->name('topic.prosesTambah');
Route::get('/kategori/edit/{id}', [TopicController::class, 'edit'])->name('topic.edit');
Route::post('/kategori/prosesEdit', [TopicController::class, 'prosesEdit'])->name('topic.prosesEdit');
Route::get('/kategori/detail/{id}', [TopicController::class, 'detail'])->name('topic.detail');
Route::get('/kategori/hapus/{id}', [TopicController::class, 'hapus'])->name('topic.hapus');


Route::get('/sub_kategori', [TypeController::class, 'index'])->name('sub_kategori.index');
Route::get('/sub_kategori/tambah', [TypeController::class, 'tambah'])->name('sub_kategori.tambah');
Route::post('/sub_kategori/prosesTambah', [TypeController::class, 'prosesTambah'])->name('sub_kategori.prosesTambah');
Route::get('/sub_kategori/ubah/{id}', [TypeController::class, 'ubah'])->name('sub_kategori.ubah');
Route::post('/sub_kategori/ubah', [TypeController::class, 'prosesUbah'])->name('sub_kategori.prosesUbah');
Route::get('/sub_kategori/detail{id}', [TypeController::class, 'detail'])->name('sub_kategori.detail');
Route::get('/sub_kategori/hapus/{id}', [TypeController::class, 'hapus'])->name('sub_kategori.hapus');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
Route::post('/users/prosesAdd', [UserController::class, 'prosesAdd'])->name('users.prosesAdd');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit/', [UserController::class, 'prosesEdit'])->name('users.prosesEdit');
Route::post('/users/detail/{id}', [UserController::class, 'detail'])->name('users.detail');
Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');


Route::get('/peran', [UnitController::class, 'index'])->name('peran.index');
Route::get('/peran/add', [UnitController::class, 'add'])->name('peran.add');
Route::post('/peran/prosesAdd', [UnitController::class, 'prosesAdd'])->name('peran.prosesAdd');
Route::get('/peran/edit/{id}', [UnitController::class, 'edit'])->name('peran.edit');
Route::post('/peran/prosesEdit', [UnitController::class, 'prosesEdit'])->name('peran.prosesEdit');
Route::get('/peran/delete/{id}', [UnitController::class, 'delete'])->name('peran.delete');


Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/add', [RoleController::class, 'add'])->name('roles.add');

Route::get('status', [StatusController::class, 'index'])->name('status.index');
Route::get('status/add', [StatusController::class, 'add'])->name('status.add');
Route::post('status/prosesAdd', [StatusController::class, 'prosesAdd'])->name('status.prosesAdd');
Route::get('status/edit/{id}', [StatusController::class, 'edit'])->name('status.edit');
Route::post('status/prosesEdit', [StatusController::class, 'prosesEdit'])->name('status.prosesEdit');
Route::get('status/delete/{id}', [StatusController::class, 'delete'])->name('status.delete');


Route::get('/permission', [PermissionsController::class, 'index'])->name('permission.index');


Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/add', [MenuController::class, 'add'])->name('menu.add');
Route::post('/menu/prosesAdd', [MenuController::class, 'prosesAdd'])->name('menu.prosesAdd');
Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::post('/menu/prosesEdit', [MenuController::class, 'prosesEdit'])->name('menu.prosesEdit');
Route::get('/menu/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');


Route::get('/sub-menu', [SubMenuController::class, 'index'])->name('sub-menu.index');
Route::get('/sub-menu/add', [SubMenuController::class, 'add'])->name('sub-menu.add');
Route::post('/sub-menu/prosesAdd', [SubMenuController::class, 'prosesAdd'])->name('sub-menu.prosesAdd');
Route::get('/sub-menu/edit/{id}', [SubMenuController::class, 'edit'])->name('sub-menu.edit');
Route::post('/sub-menu/prosesEdit', [SubMenuController::class, 'prosesEdit'])->name('sub-menu.prosesEdit');
Route::get('/sub-menu/delete/{id}', [SubMenuController::class, 'delete'])->name('sub-menu.delete');


Route::get('/unit_kerja', [UnitKerjaController::class, 'index'])->name('unit_kerja.index');
Route::get('/unit_kerja/add', [UnitKerjaController::class, 'add'])->name('unit_kerja.add');
Route::post('/unit_kerja/prosesTambah', [UnitKerjaController::class, 'prosesTambah'])->name('unit_kerja.prosesTambah');
Route::get('/unit_kerja/edit/{id}', [UnitKerjaController::class, 'edit'])->name('unit_kerja.edit');
Route::post('/unit_kerja/prosesEdit', [UnitKerjaController::class, 'prosesEdit'])->name('unit_kerja.prosesEdit');
Route::get('/unit_kerja/delete/{id}', [UnitKerjaController::class, 'delete'])->name('unit_kerja.delete');


Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
Route::get('/ticket/addData', [TicketController::class, 'addData'])->name('ticket.addData');
Route::post('/get-subcategories', [TicketController::class, 'getSubcategories']);
Route::post('/ticket/prosesTambah', [TicketController::class, 'prosesTambah'])->name('ticket.prosesTambah');
Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
Route::post('/ticket/prosesEdit', [TicketController::class, 'prosesEdit'])->name('ticket.prosesEdit');
Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
Route::post('/ticket/proses/{id}', [TicketController::class, 'proses'])->name('ticket.proses');
Route::get('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket.delete');


Route::get('/laporan', [ReportController::class, 'index'])->name('report.index');


Route::get('/hak-akses', [HakAksesController::class, 'index'])->name('hak_akses.index');


// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/profile', [ProfileLoginController::class, 'edit'])->name('profile.edit');
// });

Route::post('/change-email', [EmailUpdateController::class, 'requestEmailChange'])->middleware('auth');
Route::get('/verify-email/{token}', [EmailUpdateController::class, 'verifyNewEmail']);



Route::middleware('auth')->group(function () {
    Route::get('/home/akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/home/akun', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/home/akun', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
















// chat
Route::get('/messages', [ChatController::class, 'fetchMessages']);
Route::post('/messages', [ChatController::class, 'sendMessage']);

Route::post('/send-message', [ChatController::class, 'sendMessage']);



// Route untuk menampilkan riwayat berdasarkan nomor tiket
Route::get('/ticket/{ticketNumber}/history', [TicketController::class, 'showTicketHistory'])->name('ticket.history');

// // untuk permission lihat
// Route::get('/manage-users', [UserController::class, 'index'])->middleware('permission:Lihat');
// Route::post('/roles/assign', [RoleController::class, 'assignRole'])->name('roles.assign');



require __DIR__.'/auth.php';
