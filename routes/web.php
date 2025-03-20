<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicKategori;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitkerjaController;
use App\Http\Controllers\PermissionsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/kirimcepat', [FrontendController::class, 'kirimcepat'])->name('kirimcepat');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs');
Route::get('/detail_ticket_kc', [FrontendController::class, 'detail_ticket_kc'])->name('detail_ticket_kc');


Route::post('/login', [AuthController::class, 'login'])->name('login');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
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


Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
Route::get('/ticket/add', [TicketController::class, 'add'])->name('ticket.add');
Route::post('/get-subcategories', [TicketController::class, 'getSubcategories']);
Route::post('/ticket/prosesTambah', [TicketController::class, 'prosesTambah'])->name('ticket.prosesTambah');
Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
Route::post('/ticket/prosesEdit', [TicketController::class, 'prosesEdit'])->name('ticket.prosesEdit');
Route::get('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
