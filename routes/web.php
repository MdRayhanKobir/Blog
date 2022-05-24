<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileUpdateController;
use App\Http\Controllers\SliderController;
use App\Models\User;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Parser\Multiple;


// frontend
Route::get('/', [FrontendController::class, 'Home'])->name('home');


// Route::get('/',[ContactController::class,'home'])->name('home');
// Route::get('/about',[ContactController::class,'about'])->name('about');
// Route::get('/contact',[ContactController::class,'contact'])->name('contact');

// admin category route
Route::get('/category/all', [CategoryController::class, 'index'])->name('all.category');
Route::post('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');

Route::get('/trash/category/{id}', [CategoryController::class, 'Trashcategory'])->name('trash.delete');
Route::get('/restore/category/{id}', [CategoryController::class, 'Restore'])->name('restore.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'Delete'])->name('delete.category');


// admin brand route
Route::get('/all/brand', [BrandController::class, 'Brands'])->name('all.brands');
Route::post('/add/brand', [BrandController::class, 'addBrand'])->name('add.brands');
Route::get('/edit/brand/{id}', [BrandController::class, 'editBrand'])->name('edit.brands');
Route::post('/update/brand/{id}', [BrandController::class, 'UpdateBrand'])->name('update.brands');
Route::get('/delete/brand/{id}', [BrandController::class, 'DeleteBrand'])->name('delete.brands');

// admin multiple image
Route::get('/multiple/image', [BrandController::class, 'MultipleImage'])->name('multiple.image');
Route::post('/multiimage/add', [BrandController::class, 'AddMultiimage'])->name('multiimage.add');

// logout
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

// admin slider
Route::get('/all/slider', [SliderController::class, 'AdminSlider'])->name('all.slider');
Route::post('/add/slider', [SliderController::class, 'AddSlider'])->name('add.slider');
Route::get('/edit/slider/{id}', [SliderController::class, 'EditSlider'])->name('edit.slider');
Route::post('/update/slider/{id}', [SliderController::class, 'UpdateSlider'])->name('update.slider');
Route::get('/delete/slider/{id}', [SliderController::class, 'DeleteSlider'])->name('delete.slider');


// admin about part
Route::get('/all/about', [AboutController::class, 'AdminAbout'])->name('all.about');
Route::post('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::get('/edit/about/{id}', [AboutController::class, 'EditAbout'])->name('edit.about');
Route::post('/update/about/{id}', [AboutController::class, 'UpdateAbout'])->name('update.about');
Route::get('/delete/about/{id}', [AboutController::class, 'DeleteAbout'])->name('delete.about');
Route::get('/about', [AboutController::class, 'About'])->name('about');

// portfolio part
Route::get('/portfolio', [PortfolioController::class, 'Portfolio'])->name('portfolio');

// admin contact
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::post('/add/contact', [ContactController::class, 'AddContact'])->name('add.contact');
Route::get('/edit/contact/{id}', [ContactController::class, 'EditContact'])->name('edit.contact');
Route::post('/update/contact/{id}', [ContactController::class, 'UpdatedContact'])->name('update.contact');
Route::get('/delete/contact/{id}', [ContactController::class, 'DeleteContact'])->name('delete.contact');

Route::get('/delete/contactform/{id}', [ContactController::class, 'DeleteContactform'])->name('delete.contactform');
Route::get('/all/contact/', [ContactController::class, 'ShowContact'])->name('all.contact');

// admin profile and password change

Route::get('/change/password',[ChangePass::class,'ChangePass'])->name('change.password');
Route::post('/update/password',[ChangePass::class,'UpdatePassword'])->name('update.password');

// prodile update
Route::get('/profile/update',[ProfileUpdateController::class,'ProfileUpdate'])->name('update.profile');
Route::post('/user/profile/update',[ProfileUpdateController::class,'UpadateUserP'])->name('update.user.profile');



// frontend contact
Route::get('/contactform', [ContactFormController::class, 'ContactForm'])->name('contactform');
Route::post('/add/contactform', [ContactFormController::class, 'AddContactform'])->name('add.contactform');














Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // // $users=User::all();
        // $users=DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});
