<?php

use App\Models\Ticket;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicKategori;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HakAksesController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitkerjaController;



use App\Http\Controllers\BoDashboardController;
use App\Http\Controllers\EmailUpdateController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\Auth\BoLoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PortalDashboardController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PortalLoginController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route bagian kirim cepat
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/kirimcepat', [FrontendController::class, 'kirimcepat'])->name('kirimcepat');
Route::get('/input_form_kc', [FrontendController::class, 'input_form_kc'])->name('input_form_kc');
Route::post('/kirimcepat', [FormController::class, 'prosesSimpan'])->name('prosesSimpan');
Route::get('/detail_ticket_kc', [FormController::class, 'detail_ticket_kc'])->name('detail_ticket_kc');

// Route::get('/cari-ticket', [FrontendController::class, 'searchTicket'])->name('searchTicket');
// Route::get('/cari-ticket', [FrontendController::class, 'searchTicketLogin'])->name('searchTicketLogin');

Route::get('/cari-ticket', [FrontendController::class, 'search'])->name('ticket.search');

Route::middleware(['auth:portal'])->group(function () {
    Route::get('/user/tickets', [FrontendController::class, 'searchTicketLogin'])->name('ticket.search');
});


Route::get('/forgetpassword', [FrontendController::class, 'forgetpassword'])->name('forgetpassword');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// Route bagian login

Route::get('/home', [FrontendController::class, 'home'])->middleware(['auth', 'verified'])->name('home');


    // Route::group(['prefix' => 'portal', 'middleware' => ['web']], function () {
    //     Route::get('/login-portal', [UserPortalAuthController::class, 'showLoginForm'])->name('user_portal.login');
    //     Route::post('/login-portal', [UserPortalAuthController::class, 'loginPortal'])->name('loginPortal');
    //     Route::post('/logout-portal', [UserPortalAuthController::class, 'logout'])->name('user_portal.logout');
    
    //     Route::middleware('auth:users_portal')->group(function () {
    //         Route::get('/backoffice', function () {
    //             return view('back.backoffice');
    //         })->name('user_portal.dashboard');
    //     });
    // });
    







// Route::get('/ticket/{id}/data_ticket_login', [FrontendController::class, 'data_ticket_login'])
//     ->name('data_ticket_login');



// Route::get('/ticket/{id}/detail_ticket_kc', [FrontendController::class, 'detail_ticket_kc'])
//     ->name('detail_ticket_kc');



Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/login', function () {
    return redirect('/login/portal'); // Atau '/login/bo' sesuai default kamu
})->name('login');




// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth', 'verified', 'permission:dashboard-view'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });




// Route::get('/dashboard', function () {
//     return view ('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/logout', [AuthController::class, 'logout']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/kategori', [TopicController::class, 'index'])->name('topic.index');
// Route::get('/kategori/tambah', [TopicController::class, 'tambah'])->name('topic.tambah');
// Route::post('/kategori/prosesTambah', [TopicController::class, 'prosesTambah'])->name('topic.prosesTambah');
// Route::get('/kategori/edit/{id}', [TopicController::class, 'edit'])->name('topic.edit');
// Route::post('/kategori/prosesEdit', [TopicController::class, 'prosesEdit'])->name('topic.prosesEdit');
// Route::get('/kategori/detail/{id}', [TopicController::class, 'detail'])->name('topic.detail');
// Route::get('/kategori/hapus/{id}', [TopicController::class, 'hapus'])->name('topic.hapus');





// Route::get('/sub_kategori', [TypeController::class, 'index'])->name('sub_kategori.index');
// Route::get('/sub_kategori/tambah', [TypeController::class, 'tambah'])->name('sub_kategori.tambah');
// Route::post('/sub_kategori/prosesTambah', [TypeController::class, 'prosesTambah'])->name('sub_kategori.prosesTambah');
// Route::get('/sub_kategori/ubah/{id}', [TypeController::class, 'ubah'])->name('sub_kategori.ubah');
// Route::post('/sub_kategori/ubah', [TypeController::class, 'prosesUbah'])->name('sub_kategori.prosesUbah');
// Route::get('/sub_kategori/detail{id}', [TypeController::class, 'detail'])->name('sub_kategori.detail');
// Route::get('/sub_kategori/hapus/{id}', [TypeController::class, 'hapus'])->name('sub_kategori.hapus');





// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
// Route::post('/users/prosesAdd', [UserController::class, 'prosesAdd'])->name('users.prosesAdd');
// Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
// Route::post('/users/edit/', [UserController::class, 'prosesEdit'])->name('users.prosesEdit');
// Route::post('/users/detail/{id}', [UserController::class, 'detail'])->name('users.detail');
// Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');









// Route::get('dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');







// Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
// Route::get('/menu/add', [MenuController::class, 'add'])->name('menu.add');
// Route::post('/menu/prosesAdd', [MenuController::class, 'prosesAdd'])->name('menu.prosesAdd');
// Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
// Route::post('/menu/prosesEdit', [MenuController::class, 'prosesEdit'])->name('menu.prosesEdit');
// Route::get('/menu/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');





// Route::get('/sub-menu', [SubMenuController::class, 'index'])->name('sub-menu.index');
// Route::get('/sub-menu/add', [SubMenuController::class, 'add'])->name('sub-menu.add');
// Route::post('/sub-menu/prosesAdd', [SubMenuController::class, 'prosesAdd'])->name('sub-menu.prosesAdd');
// Route::get('/sub-menu/edit/{id}', [SubMenuController::class, 'edit'])->name('sub-menu.edit');
// Route::post('/sub-menu/prosesEdit', [SubMenuController::class, 'prosesEdit'])->name('sub-menu.prosesEdit');
// Route::get('/sub-menu/delete/{id}', [SubMenuController::class, 'delete'])->name('sub-menu.delete');






// Route::get('/unit_kerja', [UnitKerjaController::class, 'index'])->name('unit_kerja.index');
// Route::get('/unit_kerja/add', [UnitKerjaController::class, 'add'])->name('unit_kerja.add');
// Route::post('/unit_kerja/prosesTambah', [UnitKerjaController::class, 'prosesTambah'])->name('unit_kerja.prosesTambah');
// Route::get('/unit_kerja/edit/{id}', [UnitKerjaController::class, 'edit'])->name('unit_kerja.edit');
// Route::post('/unit_kerja/prosesEdit', [UnitKerjaController::class, 'prosesEdit'])->name('unit_kerja.prosesEdit');
// Route::get('/unit_kerja/delete/{id}', [UnitKerjaController::class, 'delete'])->name('unit_kerja.delete');





// Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
// Route::get('/ticket/addData', [TicketController::class, 'addData'])->name('ticket.addData');
// Route::post('/get-subcategories', [TicketController::class, 'getSubcategories']);
// Route::post('/ticket/prosesTambah', [TicketController::class, 'prosesTambah'])->name('ticket.prosesTambah');
// Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
// Route::post('/ticket/prosesEdit', [TicketController::class, 'prosesEdit'])->name('ticket.prosesEdit');
// Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
// Route::post('/ticket/proses/{id}', [TicketController::class, 'proses'])->name('ticket.proses');
// Route::get('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket.delete');


// Route::middleware(['permission:role-list|role-create|role-edit|role-delete'])
//     ->group(function () {
//         Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
//         Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
//     });



// Route::get('/laporan', [ReportController::class, 'export'])->name('export.ticket');






// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/profile', [ProfileLoginController::class, 'edit'])->name('profile.edit');
// });



//bagian form controller



// Route::middleware('auth')->group(function () {
// });




// Back Office
// Route::get('login-bo', [BoLoginController::class, 'showLoginForm']);
// Route::post('login-bo', [BoLoginController::class, 'login']);
// Route::post('logout-bo', [BoLoginController::class, 'logout']);

// // Portal
// Route::get('login-portal', [PortalLoginController::class, 'showLoginForm']);
// Route::post('login-portal', [PortalLoginController::class, 'login']);
// Route::post('logout-portal', [PortalLoginController::class, 'logout']);

// Protected routes
// Route::middleware('auth:bo')->group(function () {
    //     Route::get('/dashboard-bo', fn () => view('back.dashboard'));
    // });
    
    // Route::middleware('auth:portal')->group(function () {
        //     Route::get('/dashboard-portal', fn () => view('front.layouts.home.home'));
        // });
        
        // Route::post('portal/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        
        
        // Kirim Cepat (tanpa login)
        Route::get('/ticket/kirim-cepat', [TicketController::class, 'formKirimCepat']);
        Route::post('/ticket/kirim-cepat', [TicketController::class, 'prosesKirimCepat']);
        
        // User Portal
        // Route::middleware('auth:bo')->group(function () {
            //     Route::get('/home', function () {
                //         return view('front.layouts.home.home');
                //     })->name('home');
                // });
            

Route::middleware('guest:portal')->group(function () {
    // Route::get('/login', function () {
    //     return redirect()->route('login.portal');
    // })->name('login');
    Route::get('/login/portal', [PortalLoginController::class, 'showLoginForm'])->name('login.portal');
    Route::post('/login/portal', [PortalLoginController::class, 'login']);
    // Route::post('/logout/portal', [PortalLoginController::class, 'logout'])->name('logout.portal');
        
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

    Route::post('/change-email', [EmailUpdateController::class, 'requestEmailChange'])->middleware('auth:portal');
    Route::get('/verify-email/{token}', [EmailUpdateController::class, 'verifyNewEmail']);

    

});


Route::middleware('guest:bo')->group(function () {
    // Route::get('/login', function () {
        //     return redirect()->route('login.bo');
        // })->name('login');
    Route::get('/login/bo', [BoLoginController::class, 'showLoginForm'])->name('login.bo');
    Route::post('/login/bo', [BoLoginController::class, 'login']);
});    

Route::middleware(['auth:portal'])->group(function () {
    Route::get('/home', [PortalDashboardController::class, 'index'])->name('home');

    Route::get('/home/input_form', [FrontendController::class, 'input_form'])
    ->name('input_form');

    Route::post('/simpan-login', [FrontendController::class, 'prosesSimpanLogin'])
    ->name('prosesSimpanLogin');

    Route::get('/ticket/{id}/data_ticket_login', [FrontendController::class, 'data_ticket_login'])
    ->name('data_ticket_login')
    ->middleware(['auth:portal', 'verified']);

    Route::get('/ticket/{id}/detail', [FrontendController::class, 'show'])->name('detail_ticket_login');


    Route::get('/home/akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/home/akun', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/home/akun', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/change-email', [EmailUpdateController::class, 'requestEmailChange']);
    Route::get('/verify-email/{token}', [EmailUpdateController::class, 'verifyNewEmail']);

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('chatPortal/{id}', [UserController::class, 'chatUser'])->name('chatPortal');
    // Route::get('/messages', [ChatController::class, 'fetchMessages']);
    // Route::post('/messages', [ChatController::class, 'sendMessage']);

    // Route::post('/send-message', [ChatController::class, 'sendMessage']);

    // Route::post('/chat/send', [ChatController::class, 'sendMessage']);

    // Route::get('chat/{id}', [TicketController::class, 'chatUser'])->name('chat');



    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Logout harus bisa diakses oleh user yang login
    Route::post('/logout/portal', [PortalLoginController::class, 'logout'])->name('logout.portal');
});

// Route::get('/login', function () {
//     return redirect()->route('login.portal');
// })->name('login');

// Untuk user BO (admin)

// Untuk user Portal
Route::get('/portal/login', [PortalLoginController::class, 'showLoginForm'])->name('login.portal');

        

Route::middleware(['auth:bo'])->group(function () {
    Route::post('/logout/bo', [BoLoginController::class, 'logout'])->name('logout.bo');

    // Route::post('/simpan-login', [FormController::class, 'prosesSimpanLogin'])->name('prosesSimpanLogin');
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Index & Detail (lihat data)
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/unit_kerja', [UnitKerjaController::class, 'index'])->name('unit_kerja.index');
        Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
    });

    // Create Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/unit_kerja/add', [UnitKerjaController::class, 'add'])->name('unit_kerja.add');
        Route::post('/unit_kerja/prosesTambah', [UnitKerjaController::class, 'prosesTambah'])->name('unit_kerja.prosesTambah');
        Route::post('/get-subcategories', [UnitKerjaController::class, 'getSubcategories']); // optional: bisa tetap public
    });

    // Edit Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/unit_kerja/edit/{id}', [UnitKerjaController::class, 'edit'])->name('unit_kerja.edit');
        Route::post('/unit_kerja/prosesEdit', [UnitKerjaController::class, 'prosesEdit'])->name('unit_kerja.prosesEdit');
        Route::post('/unit_kerja/proses/{id}', [UnitKerjaController::class, 'proses'])->name('unit_kerja.proses');
    });

    // Delete Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
    Route::get('/unit_kerja/delete/{id}', [UnitKerjaController::class, 'delete'])->name('unit_kerja.delete');
    });

    // Hak Akses
    Route::get('/hak-akses', [HakAksesController::class, 'index'])->name('hak_akses.index');

    // Index & Detail (lihat data)
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
        Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
        Route::get('/ticket/konfirmasi/{id}', [TicketController::class, 'konfirmasi'])->name('ticket.konfirmasi');
        Route::post('/ticket/konfirmasi/{id}', [TicketController::class, 'prosesKonfirmasi'])->name('ticket.prosesKonfirmasi');
    });

    // Create Ticket
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/ticket/addData', [TicketController::class, 'addData'])->name('ticket.addData');
        Route::post('/ticket/prosesTambah', [TicketController::class, 'prosesTambah'])->name('ticket.prosesTambah');
        Route::post('/get-subcategories', [TicketController::class, 'getSubcategories']); // optional: bisa tetap public
    });

    // Edit Ticket
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
        Route::post('/ticket/prosesEdit', [TicketController::class, 'prosesEdit'])->name('ticket.prosesEdit');
        Route::post('/ticket/proses/{id}', [TicketController::class, 'proses'])->name('ticket.proses');
    });

    // Delete Ticket
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket.delete');
    });



    Route::get('/chat/{ticket_id}', [TicketController::class, 'showChat']) // atau auth:portal, tergantung guard
    ->name('chat.show');


    

    Route::get('/laporan', [ReportController::class, 'index'])->name('report.index');

    // Index & Detail (lihat data)
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub-menu', [SubMenuController::class, 'index'])->name('sub-menu.index');
        // Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
    });

    // Create Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub-menu/add', [SubMenuController::class, 'add'])->name('sub-menu.add');
        Route::post('/sub-menu/prosesAdd', [SubMenuController::class, 'prosesAdd'])->name('sub-menu.prosesAdd');
        Route::post('/get-subcategories', [SubMenuController::class, 'getSubcategories']); // optional: bisa tetap public
    });

    // Edit Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub-menu/edit/{id}', [SubMenuController::class, 'edit'])->name('sub-menu.edit');
        Route::post('/sub-menu/prosesEdit', [SubMenuController::class, 'prosesEdit'])->name('sub-menu.prosesEdit');
        Route::post('/sub-menu/proses/{id}', [SubMenuController::class, 'proses'])->name('sub-menu.proses');
    });

    // Delete Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub-menu/delete/{id}', [SubMenuController::class, 'delete'])->name('sub-menu.delete');
    });

    // Index & Detail (lihat data)
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');    
        // Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
    });

    // Create Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/menu/add', [MenuController::class, 'add'])->name('menu.add');
        Route::post('/menu/prosesAdd', [MenuController::class, 'prosesAdd'])->name('menu.prosesAdd');
        Route::post('/get-subcategories', [MenuController::class, 'getSubcategories']); // optional: bisa tetap public
    });

    // Edit Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::post('/menu/prosesEdit', [MenuController::class, 'prosesEdit'])->name('menu.prosesEdit');
        Route::post('/menu/proses/{id}', [MenuController::class, 'proses'])->name('menu.proses');
    });

    // Delete Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/menu/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');
    });

    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/portal', [PortalController::class, 'index'])->name('portal.index');
        // Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
    });
    
    Route::middleware(['auth:bo'])
        ->group(function () {
            Route::get('/portal/{portalrole}', [PortalController::class, 'detail'])->name('portal.show');
        });
    
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/portal/add', [PortalController::class, 'add'])->name('portal.add');
        Route::post('/portal/prosesAdd', [PortalController::class, 'prosesAdd'])->name('portal.prosesAdd');
        Route::post('/get-subcategories', [PortalController::class, 'getSubcategories']); // optional: bisa tetap public
    });
    
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/portal/edit/{id}', [PortalController::class, 'edit'])->name('portal.edit');
        Route::post('/portal/edit/{id}', [PortalController::class, 'update'])->name('portal.prosesEdit');
        Route::post('/portal/proses/{id}', [PortalController::class, 'proses'])->name('portal.proses');
    });
    
    Route::middleware(['auth:bo'])->group(function () {
        Route::post('/portal/detail/{id}', [PortalController::class, 'detail'])->name('portal.detail');
    });
    
    // Delete Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/portal/delete/{id}', [PortalController::class, 'delete'])->name('portal.delete');
    });

    
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        // Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
    });

    // Create Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
        Route::post('/users/prosesAdd', [UserController::class, 'prosesAdd'])->name('users.prosesAdd');
        Route::post('/get-subcategories', [UserController::class, 'getSubcategories']); // optional: bisa tetap public
    });

    // Edit Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/edit/', [UserController::class, 'prosesEdit'])->name('users.prosesEdit');
        Route::post('/users/proses/{id}', [UserController::class, 'proses'])->name('users.proses');
    });

    Route::middleware(['auth:bo'])->group(function () {
        Route::post('/users/detail/{id}', [UserController::class, 'detail'])->name('users.detail');
    });

    // Delete Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });
    

    // Route::get('chat/{id}', [UserController::class, 'chatUser'])->name('chat');

    Route::get('/chat/{id}', function($id){
        return view('user-chat',[
            'id' => $id
        ]);
    })->name('chat');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    

 
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


    // Index & Detail (lihat data)
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub_kategori', [TypeController::class, 'index'])->name('sub_kategori.index');
        // Route::get('/ticket/detail/{id}', [TicketController::class, 'detail'])->name('ticket.detail');
    });

    // Create Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub_kategori/tambah', [TypeController::class, 'tambah'])->name('sub_kategori.tambah');
        Route::post('/sub_kategori/prosesTambah', [TypeController::class, 'prosesTambah'])->name('sub_kategori.prosesTambah');
        Route::post('/get-subcategories', [TypeController::class, 'getSubcategories']); // optional: bisa tetap public
    });

    // Edit Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub_kategori/ubah/{id}', [TypeController::class, 'ubah'])->name('sub_kategori.ubah');
        Route::post('/sub_kategori/ubah', [TypeController::class, 'prosesUbah'])->name('sub_kategori.prosesUbah');
        Route::post('/sub_kategori/proses/{id}', [TypeController::class, 'proses'])->name('sub_kategori.proses');
    });

    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub_kategori/detail{id}', [TypeController::class, 'detail'])->name('sub_kategori.detail');
    });

    // Delete Unit Kerja
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/sub_kategori/hapus/{id}', [TypeController::class, 'hapus'])->name('sub_kategori.hapus');
    });


    Route::middleware(['auth:bo', 'permission:role-list'])
    ->group(function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    });

Route::middleware(['auth:bo', 'permission:role-create'])
    ->group(function () {
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    });

Route::middleware(['auth:bo', 'permission:role-edit'])
    ->group(function () {
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    });

Route::middleware(['auth:bo', 'permission:role-delete'])
    ->group(function () {
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });




    // Untuk menampilkan daftar kategori
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/kategori', [TopicController::class, 'index'])->name('topic.index');
        Route::get('/kategori/detail/{id}', [TopicController::class, 'detail'])->name('topic.detail');
    });

    // Untuk menambahkan kategori
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/kategori/tambah', [TopicController::class, 'tambah'])->name('topic.tambah');
        Route::post('/kategori/prosesTambah', [TopicController::class, 'prosesTambah'])->name('topic.prosesTambah');
    });

    // Untuk mengedit kategori
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/kategori/edit/{id}', [TopicController::class, 'edit'])->name('topic.edit');
        Route::post('/kategori/prosesEdit', [TopicController::class, 'prosesEdit'])->name('topic.prosesEdit');
    });

    // Untuk melihat detail kategori
    // Route::middleware(['permission:kategori-detail'])->group(function () {
    //     Route::get('/kategori/detail/{id}', [TopicController::class, 'detail'])->name('topic.detail');
    // });

    // Untuk menghapus kategori
    Route::middleware(['auth:bo'])->group(function () {
        Route::get('/kategori/hapus/{id}', [TopicController::class, 'hapus'])->name('topic.hapus');
    });

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);


    Route::get('/report/export', [ReportController::class, 'export'])->name('report.export');




    // Route::get('/home/akun', [ProfileController::class, 'profile.edit'])
    // ->name('profile.edit') 
    // ->middleware(['auth:portal', 'verified']);

    // Route::get('/home/profile', [FrontendController::class, 'profile'])
    //     ->name('profile') 
    //     ->middleware(['auth:portal', 'verified']);
    
    
   
       // ->middleware(['auth', 'verified']);
    
   
    
   



    // chat
    // Route::get('/messages', [ChatController::class, 'fetchMessages']);
    // Route::post('/messages', [ChatController::class, 'sendMessage']);

    // Route::post('/send-message', [ChatController::class, 'sendMessage']);



    // Route untuk menampilkan riwayat berdasarkan nomor tiket
    Route::get('/ticket/{ticketNumber}/history', [TicketController::class, 'showTicketHistory'])->name('ticket.history');

    // // untuk permission lihat
    // Route::get('/manage-users', [UserController::class, 'index'])->middleware('permission:Lihat');
    // Route::post('/roles/assign', [RoleController::class, 'assignRole'])->name('roles.assign');


    // Route::post('/chat/send', [ChatController::class, 'sendMessage'])->middleware('auth:bo');

    // Route::get('chat/{id}', [TicketController::class, 'chatUser'])->name('chat');

    Route::get('/home/detail_ticket', [FrontendController::class, 'detail_ticket'])
        ->name('detail_ticket')
        ->middleware(['auth:portal', 'verified']);
        
    // Close Ticket dari detail ticket 
    Route::post('/home/detail_ticket/close/{id}', [FrontendController::class, 'close_ticket'])
        ->name('ticket.close')
        ->middleware(['auth:portal', 'verified']);

    Route::get('/home/detail_ticket_closed', [FrontendController::class, 'detail_ticket_closed'])
            ->name('home.detail_ticket_closed')
        ->middleware(['auth:portal', 'verified']);

    Route::get('/home/faqs_login', [FrontendController::class, 'faqs_login'])
        ->name('faqs_login')
        ->middleware(['auth:portal', 'verified']);

    Route::get('/home/contact_login', [FrontendController::class, 'contact_login'])
        ->name('home.contact_login')
        ->middleware(['auth:portal', 'verified']);

    Route::get('/home/ticket/{id}/edit', [FrontendController::class, 'edit'])->name('ticketlogin.edit');
    Route::post('home/ticket/proseUpdate', [FrontendController::class, 'prosesUpdate'])->name('ticket.prosesUpdate');



});
// Route::middleware(['auth:portal'])->group(function () {
// });

// Route::get('/dashboard', function () {
//     $totalTicketsOpen = Ticket::whereHas('status', function ($query) {
//         $query->where('name', 'Opens'); // sesuaikan dengan field di tabel status
//     })->count();

//     $totalTicketsProses = Ticket::whereHas('status', function ($query) {
//         $query->where('name', 'Processed'); // pastikan ini sesuai kolom dan value di tabel master_status
//     })->count();
//     $totalTicketsClose = Ticket::whereHas('status', function ($query) {
//         $query->where('name', 'Closed'); // pastikan ini sesuai kolom dan value di tabel master_status
//     })->count();

//     $ticketData = Ticket::with('status')
//         ->get()
//         ->groupBy(fn($ticket) => $ticket->status->name)
//         ->map(fn($group) => $group->count());
    
    
//     return view('back.dashboard', compact('totalTicketsOpen','totalTicketsProses','totalTicketsClose','ticketData'));
// })->middleware('auth:bo')->name('dashboard');



// Route::middleware('auth:portal')->group(function () {
    //     Route::get('/home', [PortalLoginController::class, 'home'])->middleware(['auth', 'verified'])->name('home');
    //     // Tambahan rute lain untuk user portal
    // });
    
// Route::middleware('auth:bo')->group(function () {   
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   

// });

// Route::get('/debug-guard', function () {
//     return [
//         'web' => auth('web')->check(),
//         'bo' => auth('bo')->check(),
//         'portal' => auth('portal')->check(),
//     ];
// });




// // Kirim Cepat
// Route::get('/ticket/kirim-cepat', [TicketController::class, 'formKirimCepat']);
// Route::post('/ticket/kirim-cepat', [TicketController::class, 'prosesKirimCepat']);

// // Portal User
// Route::get('/login/portal', [PortalLoginController::class, 'showLoginForm'])->name('login.portal');
// Route::post('/login/portal', [PortalLoginController::class, 'login']);
// Route::post('/logout/portal', [PortalLoginController::class, 'logout'])->name('logout.portal');

// // BOS / Admin
// Route::get('/login/bos', [BoLoginController::class, 'showLoginForm'])->name('login.bos');
// Route::post('/login/bos', [BoLoginController::class, 'login']);
// Route::post('/logout/bos', [BoLoginController::class, 'logout'])->name('logout.bos');

// Route::middleware('auth:bo')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('back.dashboard');
//     })->name('bo.dashboard');
// });


// Route::middleware(['auth:portal'])->group(function () {
//     Route::get('/portal/dashboard', [PortalDashboardController::class, 'index']);
// });

// Route::middleware(['auth:bos'])->group(function () {
//     Route::get('/bos/dashboard', [BoDashboardController::class, 'index']);
// });



    // Route::group(['middleware' => ['auth:bo']], function() {
       
    // });




    


// require __DIR__.'/auth.php';
