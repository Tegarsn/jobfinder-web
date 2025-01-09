<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\daftarFreelanceController;
use App\Http\Controllers\LoginController as ControllersLoginController;

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


// Route::get('/landing', [\App\Http\Controllers\registerController::class, 'landing'])
//     ->name("landing"); Iki Wes gak di perlukan
Route::get('/register', [\App\Http\Controllers\registerController::class, 'Registerform'])
    ->name("Registerform");
Route::post('/register', [\App\Http\Controllers\registerController::class, 'register'])->name('register');


Route::get('/login', [App\Http\Controllers\loginController::class, 'formlogin'])->name('formlogin');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [ControllersLoginController::class, 'logout'])->name('logout');




Route::get('/Formdaftarfreelance', [App\Http\Controllers\daftarFreelanceController::class, 'formdaftar'])->name('daftarfreelance');


Route::post('/freelancers', [App\Http\Controllers\daftarFreelanceController::class, 'store'])->name('freelancers.store');
Route::get('/datafreelancer', [App\Http\Controllers\daftarFreelanceController::class, 'getfreelancer'])->name('datafreelancer');
Route::get('/freelancer/{id}', [App\Http\Controllers\daftarFreelanceController::class, 'show'])->name('viewfreelancer');

Route::delete('/freelancer/{id}', [App\Http\Controllers\daftarFreelanceController::class, 'destroy'])->name('freelancer.destroy');
Route::post('/freelancer/{id}/terima', [App\Http\Controllers\daftarFreelanceController::class, 'terima'])->name('freelancer.terima');
Route::get('/daftarfreelancewait', [App\Http\Controllers\daftarFreelanceController::class, 'wait'])->name('waitproses');

// DAshboardFreelance
Route::get('/DashboardFreelance', [App\Http\Controllers\freelanceController::class, 'Dashboardfreelance'])->name('Dashboardfreelance');

// Route Upload Jasa
Route::get('/formUploadJasa', [App\Http\Controllers\uploadjasaController::class, 'formuploadjasa'])->name('formuploadjasa');
// Buat menampilkan Landing page
Route::get('/landing', [App\Http\Controllers\freelanceController::class, 'checkFreelancerStatus'])->name('landing'); 
// Buat upload jasa
Route::post('/upload-jasa', [App\Http\Controllers\uploadjasaController::class, 'store'])->name('uploadjasa.store');


// Graphic Desain
Route::get('/graphicdesign', [App\Http\Controllers\GraphicDesigncontroller::class, 'view1'])->name('graphicdesign');
Route::get('/graphicdesain-logo', [App\Http\Controllers\GraphicDesigncontroller::class, 'logo'])->name('graphicdesign1');
Route::get('/Graphicdesign-Architecture', [App\Http\Controllers\GraphicDesigncontroller::class, 'arsitektur'])->name('arsitektur');
Route::get('/Graphicdesign-interior', [App\Http\Controllers\GraphicDesigncontroller::class, 'designinterior'])->name('designinterior');
Route::get('/Graphicdesign-Web&App', [App\Http\Controllers\GraphicDesigncontroller::class, 'webapp'])->name('webapp');
Route::get('/Graphicdesign-3D-Design', [App\Http\Controllers\GraphicDesigncontroller::class, 'dimensi'])->name('dimensi');
Route::get('/Graphicdesign-Art-Ilustrator', [App\Http\Controllers\GraphicDesigncontroller::class, 'artillustrator'])->name('artillustrator');
Route::get('/Graphicdesign-PhotoEditor', [App\Http\Controllers\GraphicDesigncontroller::class, 'photoeditor'])->name('photoeditor');
Route::get('/Graphicdesign-FashionEditor', [App\Http\Controllers\GraphicDesigncontroller::class, 'fashioneditor'])->name('fashioneditor');

// Route Code programing
Route::get('/Codeprograming', [App\Http\Controllers\codeprogramingController::class, 'view'])->name('codeprograming');
Route::get('/Codeprograming-WebsiteDevelopment', [App\Http\Controllers\codeprogramingController::class, 'WebsiteDevelopment'])->name('WebsiteDevelopment');
Route::get('/Codeprograming-MobileDevelopment', [App\Http\Controllers\codeprogramingController::class, 'MobileDevelopment'])->name('MobileDevelopment');
Route::get('/Codeprograming-AIDevelopment', [App\Http\Controllers\codeprogramingController::class, 'AIDevelopment'])->name('AIDevelopment');
Route::get('/Codeprograming-Cybersecurity', [App\Http\Controllers\codeprogramingController::class, 'Cybersecurity'])->name('Cybersecurity');
Route::get('/Codeprograming-GameDevelopment', [App\Http\Controllers\codeprogramingController::class, 'GameDevelopment'])->name('GameDevelopment');


// Route Digital Marketing
Route::get('/digital-marketing', [App\Http\Controllers\digitalmarketingController::class, 'view'])->name('digitalmarketing');
Route::get('/DigitalMarketing-EcommerceMarketing', [App\Http\Controllers\digitalmarketingController::class, 'ecommerce'])->name('ecommerce');
Route::get('/DigitalMarketing-AffiliateMarketing', [App\Http\Controllers\digitalmarketingController::class, 'Affiliate'])->name('Affiliate');
Route::get('/DigitalMarketing-PaidSosial', [App\Http\Controllers\digitalmarketingController::class, 'PaidSosial'])->name('PaidSosial');
Route::get('/DigitalMarketing-MarketingStrategy', [App\Http\Controllers\digitalmarketingController::class, 'MarketingStrategy'])->name('MarketingStrategy');
Route::get('/DigitalMarketing-SEO', [App\Http\Controllers\digitalmarketingController::class, 'SEO'])->name('SEO');
Route::get('/DigitalMarketing-ContentMarketing', [App\Http\Controllers\digitalmarketingController::class, 'ContentMarketing'])->name('ContentMarketing');
Route::get('/DigitalMarketing-AnalysticTracking', [\App\Http\Controllers\digitalmarketingController::class, 'AnalyticsAndTracking'])->name('AnalyticsAndTracking');
Route::get('DigitalMarketing-ProgrammaticAdvertising', [App\Http\Controllers\digitalmarketingController::class, 'ProgrammaticAdvertising'])->name('ProgrammaticAdvertising');

// Route Video & Animation
Route::get('/video & Animation', [App\Http\Controllers\videoanimationController::class, 'view'])->name('videoanimation');

// Route Music & Audio
Route::get('/Music & Audio', [App\Http\Controllers\musicaudioController::class, 'view'])->name('musicaudio');

// ROute Bussiness
Route::get ('/Bussiness', [App\Http\Controllers\bussinessController::class, 'view'])->name('bussiness');

// Route Writing Translation
Route::get ('/Writing-Translation', [App\Http\Controllers\wiritingtranslationController::class, 'view'])->name('writingtranslation');

// Route Data Science 
Route::get ('/Data-Science', [App\Http\Controllers\datascienceController::class, 'view'])->name('datascience');





Route::get('/Viewjasa{id}', [App\Http\Controllers\GraphicDesigncontroller::class, 'ViewLogo'])->name('Viewjasalogo');


Route::get('FormCheckout{id}', [App\Http\Controllers\pemesananController::class, 'checkout'])->name('checkout');


// Route::get('/order/{id}', [App\Http\Controllers\pemesananController::class, 'showForm'])->name('order.show');
Route::post('/order-jasa{id}',[App\Http\Controllers\pemesananController::class, 'store'])->name('order.store');

Route::get('/yourorder', [App\Http\Controllers\freelanceController::class, 'orderuser'])->name('orderuser');


// Route::post('/order/accept', [App\Http\Controllers\freelanceController::class, 'acceptOrder'])->name('order.accept');
Route::post('/order/{id}/update-status', [App\Http\Controllers\pemesananController::class, 'updateStatus'])->name('order.updateStatus');

// web.php
Route::post('/order/terima', [App\Http\Controllers\freelanceController::class, 'terimaOrder'])->name('order.terima');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.admin');

Route::get('/lowongan', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('lowongan');
Route::get('/upload_lowongan', [App\Http\Controllers\AdminController::class, 'upload_lowongan'])->name('upload_lowongan');

Route::post('/submit-lowongan', [App\Http\Controllers\LowonganController::class, 'submit'])->name('submit-lowongan');

// Edit lowongan
Route::get('/lowongan/{id}/edit', [App\Http\Controllers\LowonganController::class, 'editLowongan'])->name('lowongan.edit');
Route::post('/lowongan/{id}/update', [App\Http\Controllers\LowonganController::class, 'updateLowongan'])->name('lowongan.update');


