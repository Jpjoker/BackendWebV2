<?php
//profile
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
//home
use App\Http\Controllers\HomeController;
//admin
use App\Http\Controllers\AdminController;
//contact 
use App\Http\Controllers\ContactController;
//faq 
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqQuestionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CommentController;
  

 // Add this import statement
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

//faq
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/faqpage', [HomeController::class, 'faqpage'])->name('faqpage');

//faq
Route::post('/submit-user-question', [FaqController::class, 'submitUserQuestion'])->name('user.faq.submit');





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
// Route::get('admin/faq', [AdminController::class, 'faq'])->name('faq'); 
//ik wou alles weer in admin doen ma dat lijk mij geen goed idee, leren uit mijn foute natuurlijk
Route::get('/faq-categories', [FaqCategoryController::class , 'index']);
Route::get('/faq-questions', [FaqQuestionController::class, 'index']);
Route::get('/faq-categories/create', [FaqCategoryController::class, 'create']);
Route::get('/faq-questions/create', [FaqQuestionController::class, 'create']);
Route::post('/faq-categories', [FaqCategoryController::class, 'store']);
Route::post('/faq-questions', [FaqQuestionController::class, 'store']);
Route::get('/faq-categories/{faqCategory}/edit', [FaqCategoryController::class, 'edit']);
Route::get('/faq-questions/{faqQuestion}/edit', [FaqQuestionController::class, 'edit']);
Route::patch('/faq-categories/{faqCategory}', [FaqCategoryController::class, 'update']);
Route::patch('/faq-questions/{faqQuestion}', [FaqQuestionController::class, 'update']) ;
Route::delete('/faq-categories/{faqCategory}', [FaqCategoryController::class, 'destroy']);
Route::delete('/faq-questions/{faqQuestion}', [FaqQuestionController::class, 'destroy']);

Route::get('admin/faq/questions', [FaqQuestionController::class, 'index'])->name('admin.faq.questions.index');
Route::patch('faq-questions/{faq_question}', [FaqQuestionController::class, 'update'])->name('faq-questions.update');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('faq/questions', FaqQuestionController::class);
});


Route::resource('admin/faq/categories', FaqCategoryController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faq-questions', FaqQuestionController::class);
    Route::resource('faq/questions', FaqQuestionController::class);
});



//FORUM

//Comment
Route::post('/postblog/{postblog_id}/comments', [adminController::class, 'storeComment'])->name('postblog.comments.store');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])
     ->name('comment.delete')
     ->middleware('is_admin');
