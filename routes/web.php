<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
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
// Route::get('/', function () {
//     return view('welcome');
// });

/*HomeController*/ 
Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/post_details/{id}', [HomeController::class, 'post_details'])->name('post_details');
Route::get('/homepage', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contactpage', [HomeController::class, 'contactPage'])->name('contactpage');

//CONTACTPAGE
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('/contactpage', [ContactController::class, 'sendEmail'])->name('contactpage');


Route::get('/contactpage', [ContactController::class, 'contactPage'])->name('contactpage');
Route::post('/contactpage', [ContactController::class, 'sendEmail'])->name('contactpage');

/*bug heres*/ 
Route::get('/blogpage', [HomeController::class, 'blogpage'])->name('blogpage')->middleware('auth');
/*
Route::get('post', [HomeController::class, 'post'])->name('post')->middleware(['auth', 'admin']);
*/

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*ProfileController*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/*Admincontroller All*/ 
/*dit is om uw post nemen = GET en daarna te posten natuurlijk tegaan posten = POST */
Route::get('/post_page', [AdminController::class, 'post_page'])->name('post_page');
// Verander 'post_page' naar 'add_post'
Route::post('/add_post', [AdminController::class, 'add_post'])->name('add_post');
Route::get('/show_post', [AdminController::class, 'show_post'])->name('post_page');
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->name('delete_post');
Route::get('/edit_post/{id}', [AdminController::class, 'edit_post'])->name('edit_post');
Route::post('/update_post/{id}', [AdminController::class, 'update_post'])->name('update_post');
// Route::get('/adminhome', 'AdminController@home')->name('admin.adminhome');
//FAQ
Route::get('admin/faq', [AdminController::class, 'faq'])->name('faq');



