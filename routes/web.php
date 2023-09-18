<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeInterfaceController;
use App\Http\Controllers\SalesInformationController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//Route for public users
Route::prefix('/')->name('Public.')->group( function(){
    //home view
    Route::get('/', [HomeInterfaceController::class, 'index'])->name('home');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');
    Route::prefix('/Products')->name('Product.')->group( function() {
        Route::get('/', [ProductController::class, 'index'])->name('listing');
    });
    Route::prefix('/Nous-contacter')->name('Contact.')->group( function () {
        Route::get('/', [ContactController::class, 'interface'])->name('contacts');
        Route::post('/', [ContactController::class, 'interfaceSave'])->name('contactsSave');
    });
    //Service View
    Route::prefix('/Nos-service')->name('Service.')->group( function (){
        Route::get('/', [HomeInterfaceController::class, 'service'])->name('index');
    });
    //Route for subscriber
    Route::post('/Abonement-newsletter', [SubscriberController::class, 'subscribe'])->name('subscribe');
});

//Route for administration
Route::prefix('/Administration')->name('Admin.')->group( function() {

    //gestion of product
    Route::prefix('/Produit')->name('Product.')->group( function() {
        Route::get('/Liste-de-tous-les-produit', [ProductController::class, 'listing'])->name('listing');
        Route::get('/ajout-d-un-nouveau-produit', [ProductController::class, 'create'])->name('create');
        Route::post('/ajout-d-un-nouveau-produit', [ProductController::class, 'store'])->name('store');

        //edit
        Route::get('/{id}/edition-d-un-produit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/edition-d-un-produit', [ProductController::class, 'update'])->name('update');
        //delete
        Route::delete('/{id}/suppression-d-un-nouveau-produit', [ProductController::class, 'delete'])->name('delete');
    });


    //Routes of our product
    Route::prefix('/categorie')->name('Category.')->group( function () {
        Route::get('/Liste-de-tous-les-categories', [CategoryController::class, 'listing'])->name('listing');
        Route::get('/Liste-de-tous-les-categories/ajout-d-un-category', [CategoryController::class, 'create'])->name('create');
        Route::post('/Liste-de-tous-les-categories/ajout-d-un-category', [CategoryController::class, 'store'])->name('store');
        //edition
        Route::get('/Liste-de-tous-les-categories/{id}/edition-d-un-category', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/Liste-de-tous-les-categories/{id}/edition-d-un-category', [CategoryController::class, 'update'])->name('update');


    });
    //Route for information sales
    Route::prefix('/Sales-Information')->name('Sales.')->group( function () {
        Route::get('/', [SalesInformationController::class, 'listing'])->name('listing');
        //creation route
        Route::get('/creation', [SalesInformationController::class, 'create'])->name('create');
        Route::post('/creation', [SalesInformationController::class, 'store'])->name('store');
        //creation route
        Route::get('/52{id}Za125/edit', [SalesInformationController::class, 'edit'])->name('edit');
        Route::put('/52{id}Za125/edit', [SalesInformationController::class, 'update'])->name('update');
        //delete
        Route::delete('/zik54{id}apoi1ps85/delete', [SalesInformationController::class, 'delete'])->name('delete');
    });

    Route::prefix('/Visual-Interface')->name('Interface.')->group( function () {
        //for home
        Route::prefix('/Acceuil-interface')->name('Home.')->group( function () {
            Route::get('/', [HomeController::class, 'listing'])->name('listing');
            //Routes for adding a new information in the homePage
            Route::get('/ajouter-des-information', [HomeController::class, 'create'])->name('create');
            Route::post('/ajouter-des-information', [HomeController::class, 'store'])->name('store');
            //Routes for updating a new information in the homePage
            Route::get('/{id}/modification',[HomeController::class, 'edit'])->name('edit');
            Route::put('/{id}/modification',[HomeController::class, 'update'])->name('update');

            //deleting
            Route::delete('/{id}/suppression',[HomeController::class, 'delete'])->name('delete');
        });
    });

    //Route for contact
    Route::prefix('/Contact')->name('Contact.')->group( function () {
        Route::get('/Liste-de-tous-les-messages-recu', [ContactController::class, 'listing'])->name('listing');
        Route::get('/2365Aki8/Pmo{id}25sa587Auz/Message', [ContactController::class, 'view'])->name('view');
     });

     //route for newsletter
     Route::prefix('/Newsletter')->name('Newsletter.')->group( function () {
        Route::get('/', [NewsletterController::class, 'listing'])->name('listing');
        Route::get('/creation', [NewsletterController::class, 'create'])->name('create');
        Route::post('/creation', [NewsletterController::class, 'store'])->name('store');

        //update
        Route::get('/{id}/edition', [NewsletterController::class, 'edit'])->name('edit');
        Route::put('/{id}/edition', [NewsletterController::class, 'update'])->name('update');
     });

});


