<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\SiteConfigController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookTableController;
use App\Http\Controllers\CauroselController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EsewaPaymentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\PrivacyPolicyController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes([
    'verify'=>true
]);
Route::get('/admin',[AdminDashboardController::class,'index'])->name('dashboard')->middleware(['auth','admin']);

// -------------------- Backend route starts -----------------------------
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::resource('site', SiteConfigController::class);
    Route::resource('sociallink', SocialLinkController::class);
    Route::resource('file', ImageController::class);
    Route::resource('product', ProductController::class);
    Route::resource('aboutUs', AboutUsController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('book-table', BookTableController::class);
    Route::resource('user', UserController::class);
    Route::resource('caurosel',CauroselController::class);
    Route::resource('order',UserProductController::class);
    Route::resource('payment',PaymentController::class);
});

// -------------------- Backend route ends -------------------------------------

// ------------------- Frontend route starts ----------------------------------
Route::middleware(['auth','verified'])->group(function(){
    Route::resource('cart', CartController::class);
});


Route::get('/', [SiteController::class, 'homepage'])->name('home');
Route::get('menu', [SiteController::class, 'menu'])->name('menu');
Route::get('about', [SiteController::class, 'about'])->name('about');
Route::get('myorder', [SiteController::class, 'myorder'])->name('myorder');
Route::put('users/update/{id}', [SiteController::class, 'userupdate'])->name('userupdate');
Route::get('pay/success', [SiteController::class, 'success'])->name('pay.success');
Route::get('pay/failed', [SiteController::class, 'fail'])->name('pay.failed');
Route::resource('address',AddressController::class);
Route::get('profile', [SiteController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('privacy',[PrivacyPolicyController::class,'index']);

// ------------------- Frontend route ends ----------------------------------

// ------------------- Esewa route starts ----------------------------------
Route::get('esewa/pay', [EsewaPaymentController::class, 'pay'])->name('esewa.pay');
Route::get('esewa/check', [EsewaPaymentController::class, 'check'])->name('esewa.check');
// to download the pdf of the bill
Route::get('pay/{transaction_code}', [PaymentController::class, 'downloadPDF'])->name('download');
Route::get('/privacy', function(){
    return view('restaurant-frontend.privacypolicy');
})->name('privacy');
// ------------------- Esewa route ends ----------------------------------
