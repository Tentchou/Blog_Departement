<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TousController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CommentNewsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContactMessageController;

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


Route::get('/contact/voir', function(){
    return view('acceuil.bases');
});

Route::get('/contact/send', [ContactController::class, 'contact'])->name('articles.contacts');

Route::prefix('article')->name('articles.')->controller(ArticleController::class)->group(function(){
    Route::get('/liste', 'index')->name('index');
    Route::get('/categorie/{category}', 'postByCategorie')->name('categorie');
    Route::get('/tags/{tag}', 'postByTag')->name('byTag');
    // Route::get('/show/{article}', 'show')->name('show');

});


Route::get('/show/{article}/',[CommentController::class, 'show'])->name('articles.show');

Route::prefix('admin')->name('admin')->middleware('auth')->controller(AdminController::class)->group(function(){

    Route::get('/index', 'index')->name('.articles.liste');
    Route::get('/admin/liste', 'indexAll')->name('.articles.all');
    Route::get('/ajouter/article', 'create')->name('.articles.ajouter');
    Route::get('/delete/{article}', 'destroy')->name('.articles.deleteArticle');
    Route::post('creer/article', 'store')->name('.articles.store');
    Route::put('update/article/{article}', 'update')->name('.articles.update');
    Route::get('editer/article/{article}', 'edit')->name('.articles.editer');

//news
    Route::get('/ajouter/news', 'createNews')->name('.articles.ajouterNews');
    Route::get('/news/listes', 'indexNews')->name('.articles.news');
    Route::get('/deletenews/{id}', 'destroyNews')->name('.articles.deletenews');
    Route::post('creer/news', 'storeNews')->name('.articles.storeNews');
    Route::put('update/news/{news}', 'updateNews')->name('.articles.updateNews');
    Route::get('editer/news/{news}', 'editNews')->name('.articles.editerNews');

    //users

    Route::get('/users/liste', 'createUsers')->name('.articles.index');
    Route::get('/users/create', 'indexUsers')->name('.articles.create');
    Route::get('/deteUsers/{users}', 'deleteUsers')->name('.articles.deleteUsers');

    //activites
    Route::get('/activites/create', 'createActivites')->name('.activite.createActivite');
    Route::post('/creer/Activites', 'storeActivites')->name('.activite.storeActivite');
    Route::get('/liste/Activites', 'indexActivite')->name('.activite.indexActivite');
    Route::get('/delete/Activite/{id}', 'destroyActivite')->name('.activite.deleteactivite');
    Route::put('/update/activite/{activites}', 'updateActivite')->name('.activite.updateactivite');
    Route::get('/editer/activite/{activite}', 'editActivite')->name('.activite.editeractivite');
});

//login

Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [LoginController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


////////////////////////////// RESET PASSWORD ////////////////////////////////

Route::get('password/reset', [LoginController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [LoginController::class, 'reset'])->name('password.update');
//Route::post('Enregistrer', [LoginController::class, 'store'])->name('login.enregistrer');

//visites

//Route::get('/visitors', [AdminController::class, 'showVisitors']);

Route::get('/visitors', [VisitorController::class, 'showVisitors']);
Route::get('/TotalUsers', [VisitorController::class, 'showUsersNUmber']);




////////////////////////////////////// COMMENTAIRES //////////////////////////////////
Route::post('/articles/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/news/{id}/comments', [CommentNewsController::class, 'storeNews'])->name('comments.storenews');


//////////////////////////////////////////////////// SUBSCRIBE //////////////////////////////////
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/articles/{id}/download-pdf', [ArticleController::class, 'downloadPdf'])->name('articles.downloadPdf');


////////////////////////////////////////////////////////////////
//////////////////////// GERER LES NEWS/ACTUALITES << PAGE DACCEUIL >> //////////////////////
//////////////////////////////////////////////////////////////


Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// /////////////////////////////////////////////////////////////////////////////
/////////////////////////////// PAGE ACCEUIL //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

Route::get('/', [NewsController::class, 'indexWelcome'])->name('acceuil.welcome');

// /////////////////////////////////////////////////////////////////////////////
/////////////////////////////// PAGE ACCEUIL Complet //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

Route::get('/departement/contact-page', [TousController::class, 'VoirProjet'])->name('contact');


//////////////////////////////////////////////////////
////////////////// message send and ressent ////////////////////
////////////////////////////////////////////////////



Route::get('/contact', [ContactMessageController::class, 'showForm'])->name('contact.form');
Route::post('/contact/send', [ContactMessageController::class, 'sendMessage'])->name('contact.send');
Route::delete('/contact/delete/{id}', [ContactMessageController::class, 'delete'])->name('message.delete');
Route::post('/admin/reply/{id}', [ContactMessageController::class, 'replyMessage'])->name('admin.reply');
// Route pour marquer les messages comme "lus" lorsque l'administrateur clique sur la notification
Route::post('/admin/notifications/read', [ContactMessageController::class, 'markNotificationsAsRead'])->name('notifications.read');

// Route pour afficher un message spécifique avec ses détails
Route::get('/admin/message/{id}', [ContactMessageController::class, 'showMessage'])->name('admin.message.show');


///////////////////////////////////////////////////////////////////
//////////////////////////// GESTION PROJETS /////////////////////
//////////////////////////////////////////////////////////////////


Route::prefix('projets')->name('projets.')->controller(ProjectController::class)->group(function(){
    Route::get('/index/liste', 'index')->name('index');
    Route::get('/categorie/{categorie_project}', 'postByCategorie')->name('categorie');
    Route::get('/Grand_Titre/{grandTitre}', 'postByBigTitle')->name('BigTitle');
    // Route::get('/show/{article}', 'show')->name('show');

});





