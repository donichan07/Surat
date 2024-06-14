<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\landing_pageConntroller;
use App\Http\Controllers\UserManagementController;

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

/** for side bar menu active */
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/landing_page', [LandingPageController::class, 'index'])->name('landing_page.index');

Route::get('/', function () {
    return redirect('/landing_page');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });
});

Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    // ----------------------------login ------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('change/password', 'changePassword')->name('change/password');
    });

    // ----------------------------- register -------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'storeUser')->name('register');
    });
});

// ----------------------------- Forgot Password -------------------------//
Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->middleware('auth')->name('home');
        Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
        Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
        Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
    });

    // ----------------------------- user controller ---------------------//
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('list/users', 'index')->middleware('auth')->name('list/users');
        Route::post('change/password', 'changePassword')->name('change/password');
        Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
        Route::post('user/update', 'userUpdate')->name('user/update');
        Route::post('user/delete', 'userDelete')->name('user/delete');
        Route::get('get-users-data', 'getUsersData')->name('get-users-data');
        /** get all data users */
    });

    // ------------------------ setting -------------------------------//
    Route::controller(SettingController::class)->group(function () {
        Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
    });

    // ------------------------ student -------------------------------//
    Route::controller(StudentController::class)->group(function () {
        Route::get('student/list', 'student')->middleware('auth')->name('student/list'); // list student
        Route::get('student/grid', 'studentGrid')->middleware('auth')->name('student/grid'); // grid student
        Route::get('student/add/page', 'studentAdd')->middleware('auth')->name('student/add/page'); // page student
        Route::post('student/add/save', 'studentSave')->name('student/add/save'); // save record student
        Route::get('student/edit/{id}', 'studentEdit'); // view for edit
        Route::post('student/update', 'studentUpdate')->name('student/update'); // update record student
        Route::post('student/delete', 'studentDelete')->name('student/delete'); // delete record student
        Route::get('student/profile/{id}', 'studentProfile')->middleware('auth'); // profile student
        Route::get('/studentlist', [StudentController::class, 'studentlist'])->name('studentlist');

    });

    // ------------------------ teacher -------------------------------//
    Route::controller(TeacherController::class)->group(function () {
        Route::get('teacher/add/page', 'teacherAdd')->middleware('auth')->name('teacher/add/page'); // page teacher
        Route::get('teacher/list/page', 'teacherList')->middleware('auth')->name('teacher/list/page'); // page teacher
        Route::get('teacher/grid/page', 'teacherGrid')->middleware('auth')->name('teacher/grid/page'); // page grid teacher
        Route::post('teacher/save', 'saveRecord')->middleware('auth')->name('teacher/save'); // save record
        Route::get('teacher/edit/{user_id}', 'editRecord'); // view teacher record
        Route::post('teacher/update', 'updateRecordTeacher')->middleware('auth')->name('teacher/update'); // update record
        Route::post('teacher/delete', 'teacherDelete')->name('teacher/delete'); // delete record teacher
        Route::get('/teacher-list', 'teacherList')->name('teacher.list'); // teacher list with search
    });
    

    // ----------------------- subject -----------------------------//
    Route::controller(SubjectController::class)->group(function () {
        Route::get('subject/list/page', 'subjectList')->middleware('auth')->name('subject/list/page'); // subject/list/page
        Route::get('subject/add/page', 'subjectAdd')->middleware('auth')->name('subject/add/page'); // subject/add/page
        Route::post('subject/save', 'saveRecord')->name('subject/save'); // subject/save
        Route::post('subject/update', 'updateRecord')->name('subject/update'); // subject/update
        Route::post('subject/delete', 'deleteRecord')->name('subject/delete'); // subject/delete
        Route::get('subject/edit/{subject_id}', 'subjectEdit'); // subject/edit/page
    });

    // ----------------------- inbox -----------------------------//
    Route::resource('inbox', InboxController::class);
    Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');
    Route::get('/inbox/create', [InboxController::class, 'create'])->name('inbox.create');
    Route::get('/inbox/{id}/edit', [InboxController::class, 'edit'])->name('inbox.edit');
    Route::post('/inbox', [InboxController::class, 'store'])->name('inbox.store');
    Route::post('/inbox/destroy', [InboxController::class, 'destroy'])->name('inbox.destroy');
    Route::get('/inbox/grid', [InboxController::class, 'grid'])->name('inbox.grid');

    // ----------------------- accounts ----------------------------//
    Route::controller(AccountsController::class)->group(function () {
        Route::get('account/fees/collections/page', 'index')->middleware('auth')->name('account/fees/collections/page'); // account/fees/collections/page
        Route::get('add/fees/collection/page', 'addFeesCollection')->middleware('auth')->name('add/fees/collection/page'); // add/fees/collection
        Route::post('fees/collection/save', 'saveRecord')->middleware('auth')->name('fees/collection/save'); // fees/collection/save
    });

    Route::controller(FullCalenderController::class)->group(function () {
        Route::get('fullcalender', 'index');
        Route::post('fullcalenderAjax', 'ajax');
    });

    // bagian kelas
    Route::get('/classes', 'ClassController@index')->name('classes.index');
    Route::get('/classes/create', 'ClassController@create')->name('classes.create');
    Route::post('/classes', 'ClassController@store')->name('classes.store');
    Route::get('/classes/{id}/edit', 'ClassController@edit')->name('classes.edit');
    Route::put('/classes/{id}', 'ClassController@update')->name('classes.update');
    Route::delete('/classes/{id}', 'ClassController@destroy')->name('classes.destroy');

    // books
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    // Peminjaman

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    // nilai

    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::get('/scores/create', [ScoreController::class, 'create'])->name('scores.create');
    Route::post('/scores', [ScoreController::class, 'store'])->name('scores.store');
    Route::get('/scores/{id}', [ScoreController::class, 'show'])->name('scores.show');
    Route::get('/scores/{id}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
    Route::put('/scores/{id}', [ScoreController::class, 'update'])->name('scores.update');
    Route::delete('/scores/{id}', [ScoreController::class, 'destroy'])->name('scores.destroy');

    // landing_page
    Route::get('/landing_page', [landing_pageConntroller::class, 'index']);

    // lessons
    Route::get('/lessons', [LessonsController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/create', [LessonsController::class, 'create'])->name('lessons.create');
    Route::post('/lessons', [LessonsController::class, 'store'])->name('lessons.store');
    Route::get('/lessons/{id}/edit', [LessonsController::class, 'edit'])->name('lessons.edit');
    Route::put('/lessons/{id}', [LessonsController::class, 'update'])->name('lessons.update');
    Route::delete('/lessons/{id}', [LessonsController::class, 'destroy'])->name('lessons.destroy');

    // landing_page
    Route::get('/landing_page', [landing_pageConntroller::class, 'index']);

    // informasi contack
    Route::resource('contact_information', 'ContactInformationController');

    // Routes untuk Eskul
    Route::get('/eskuls', [EskulController::class, 'index'])->name('eskuls.index');
    Route::get('/eskuls/create', [EskulController::class, 'create'])->name('eskuls.create');
    Route::post('/eskuls', [EskulController::class, 'store'])->name('eskuls.store');
    Route::get('/eskuls/{eskul}', [EskulController::class, 'show'])->name('eskuls.show');
    Route::get('/eskuls/{eskul}/edit', [EskulController::class, 'edit'])->name('eskuls.edit');
    Route::put('/eskuls/{eskul}', [EskulController::class, 'update'])->name('eskuls.update');
    Route::delete('/eskuls/{eskul}', [EskulController::class, 'destroy'])->name('eskuls.destroy');


    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');


    Route::get('/test-total-pendapatan', function () {
        return \App\Models\Payment::totalPendapatan();
    });
});
