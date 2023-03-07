<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\CountryFlagController;
use App\Http\Controllers\Frontend\FAQSController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\Tone\ToneController;
use App\Http\Controllers\Admin\Type\TypeController;
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\Admin\Store\StoreController;
use App\Http\Controllers\Admin\Style\StyleController;
use App\Http\Controllers\Frontend\OurStoryController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Frontend\CertificateController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Frontend\MerchandisingController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Frontend\ProductDetailController;
use App\Http\Controllers\Admin\StoreCity\StoreCityController;
use App\Http\Controllers\Admin\Collection\CollectionController;
use App\Http\Controllers\Frontend\TermsAndConditionsController;
use App\Http\Controllers\Admin\Distributor\DistributorController;
use App\Http\Controllers\Admin\ActorProduct\ActorProductController;
use App\Http\Controllers\Admin\BecomeSeller\BecomeSellerController;
use App\Http\Controllers\Admin\Certifications\CertificationController;
use App\Http\Controllers\Admin\ReplacementCycle\ReplacementCycleController;
use App\Http\Controllers\Frontend\DistributorController as FrontendDistributorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


require __DIR__ . DIRECTORY_SEPARATOR . 'auth.php';

Route::group([
    // 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    // 'middleware'    => ['auth']
], function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('products/{by?}/{slug?}', [HomeController::class, 'collections'])->name('collections');
    Route::get('filters/{id}', [HomeController::class, 'filters'])->name('filters');
    Route::get('clear-filters', [HomeController::class, 'clearFilters'])->name('filters.clear');
    Route::get('all-products',[AllProductsController::class,'index'])->name('all.products');

    Route::get('distributors',[FrontendDistributorController::class,'index'])->name('distributors');
    Route::get('privacy-policy',[PrivacyPolicyController::class,'create'])->name('privacy-policy');
    Route::get('terms-and-conditions',[TermsAndConditionsController::class,'create'])->name('terms-and-conditions');

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
    Route::get('cachew/flush', [DashboardController::class, 'cacheFlush'])->name('cache.flush');

    Route::get('product-details/{slug}',[ProductDetailController::class,'create'])->name('product.detail');
    Route::get('certificates',[CertificateController::class,'index'])->name('certificates');
    Route::get('our-story',[OurStoryController::class,'create'])->name('our-story');
    Route::get('merchandising',[MerchandisingController::class,'create'])->name('merchandising');
    Route::get('faqs',[FAQSController::class,'create'])->name('faqs');

    Route::get('contact-us',[ContactUsController::class,'create'])->name('contact-us');
    Route::post('store',[ContactUsController::class,'store'])->name('contact-us.store');

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::controller(ColorController::class)->group(function(){

            Route::get('colors','index')->name('color.index');
            Route::get('create-color','create')->name('color.create');
            Route::get('color-image','getImage')->name('color.image');
            Route::get('color-banner','getBanner')->name('color.banner');
            Route::get('color-edit/{id}','edit')->name('color.edit');
            Route::get('color-destroy','destroySelected')->name('color.destroy');
            Route::post('color-store','store')->name('color.store');
            Route::post('color-update/{id}','update')->name('color.update');

        });

        Route::controller(CollectionController::class)->group(function(){

            Route::get('collections','index')->name('collection.index');
            Route::get('create-collection','create')->name('collection.create');
            Route::get('collection-image','getImage')->name('collection.image');
            Route::get('collection-banner','getBanner')->name('collection.banner');
            Route::post('collection-store','store')->name('collection.store');
            Route::get('collection-edit/{id}','edit')->name('collection.edit');
            Route::post('collection-update/{id}','update')->name('collection.update');
            Route::get('collection-destroy','destroySelected')->name('collection.destroy');

        });

        Route::controller(ReplacementCycleController::class)->prefix('replacement-cylce')->group(function(){

            Route::get('/','index')->name('replacement-cylce.index');
            Route::get('create','create')->name('replacement-cylce.create');
            Route::post('store','store')->name('replacement-cylce.store');
            Route::get('image','getImage')->name('replacement-cylce.image');
            Route::get('edit/{id}','edit')->name('replacement-cylce.edit');
            Route::post('update/{id}','update')->name('replacement-cylce.update');
            Route::get('destroy','destroy')->name('replacement-cylce.destroy');


        });

        ROute::controller(ToneController::class)->prefix('tone')->group(function(){

            Route::get('/','index')->name('tone.index');
            Route::get('create','create')->name('tone.create');
            Route::post('store','store')->name('tone.store');
            Route::get('edit/{id}','edit')->name('tone.edit');
            Route::post('update/{id}','update')->name('tone.update');
            Route::get('destroy','destroy')->name('tone.destroy');

        });

        Route::controller(StyleController::class)->prefix('style')->group(function(){

            Route::get('/','index')->name('style.index');
            Route::get('create','create')->name('style.create');
            Route::post('store','store')->name('style.store');
            Route::get('edit/{id}','edit')->name('style.edit');
            Route::post('update/{id}','update')->name('style.update');
            Route::get('destroy','destroy')->name('style.destroy');
            Route::get('image','getImage')->name('style.image');


        });

        Route::controller(TypeController::class)->prefix('type')->group(function(){

            Route::get('/','index')->name('type.index');
            Route::get('create','create')->name('type.create');
            Route::post('store','store')->name('type.store');
            Route::get('edit/{id}','edit')->name('type.edit');
            Route::post('update/{id}','update')->name('type.update');
            Route::get('destroy','destroy')->name('type.destroy');
            Route::get('image','getImage')->name('type.image');

        });

        Route::controller(DistributorController::class)->prefix('distributor')->group(function(){

            Route::get('/','index')->name('distributor.index');
            Route::get('create','create')->name('distributor.create');
            Route::post('store','store')->name('distributor.store');
            Route::get('image','getImage')->name('distributor.image');
            Route::get('edit/{id}','edit')->name('distributor.edit');
            Route::post('update/{id}','update')->name('distributor.update');
            Route::get('destroy','destroy')->name('distributor.destroy');

        });

        Route::controller(StoreController::class)->prefix('store')->group(function(){

            Route::get('/','index')->name('store.index');
            Route::get('create','create')->name('store.create');
            Route::post('store','store')->name('store.store');
            Route::get('edit/{id}','edit')->name('store.edit');
            Route::post('update/{id}','update')->name('store.update');
            // Route::get('getStores','cityStores')->name('city.cityStores');
            Route::get('destroy','destroy')->name('store.destroy');

        });

        Route::controller(ProductController::class)->prefix('product')->group(function(){

            Route::get('/','index')->name('product.index');
            Route::get('image','getImage')->name('product.image');
            Route::get('beforeImage','beforeImage')->name('product.beforeImage');
            Route::get('afterImage','afterImage')->name('product.afterImage');
            Route::get('productDetail','productDetails')->name('product.detail');
            Route::get('create','create')->name('product.create');
            Route::post('store','store')->name('product.store');
            Route::get('edit/{id}','edit')->name('product.edit');
            Route::post('update/{id}','update')->name('product.update');
            Route::get('delete','destroy')->name('product.destroy');

        });

        Route::controller(ActorProductController::class)->prefix('actor-product')->group(function(){

            Route::get('/','index')->name('actor-product.index');
            Route::get('create','create')->name('actor-product.create');
            Route::post('store','store')->name('actor-product.store');
            Route::get('image','getImage')->name('actor-product.image');
            Route::get('edit/{id}','edit')->name('actor-product.edit');
            Route::post('update/{id}','update')->name('actor-product.update');
            Route::get('destroy','destroy')->name('actor-product.destroy');

        });

        Route::controller(BannerController::class)->prefix('banner')->group(function(){

            Route::get('/','index')->name('banner.index');
            Route::get('create','create')->name('banner.create');
            Route::post('store','store')->name('banner.store');
            Route::get('edit/{id}','edit')->name('banner.edit');
            Route::get('images','getImages')->name('banner.images');
            Route::post('update/{id}','update')->name('banner.update');
            Route::get('delete','delete')->name('banner.delete');

        });

        Route::controller(CertificationController::class)->prefix('certifications')->group(function(){

            Route::get('/','index')->name('certificate.index');
            Route::get('create','create')->name('certificate.create');
            Route::post('store','store')->name('certificate.store');
            Route::get('getImage','getImage')->name('certificate.getImage');
            Route::get('delete','delete')->name('certificate.delete');
            Route::get('edit/{id}','edit')->name('certificate.edit');
            Route::post('update/{id}','update')->name('certificate.update');

        });

        Route::controller(ContactUsController::class)->prefix('contact-us')->group(function(){

            Route::get('/','index')->name('contact-us.index');

        });

        Route::controller(StoreCityController::class)->prefix('cities')->group(function(){

            Route::get('/','index')->name('city.index');
            Route::get('create','create')->name('city.create');
            Route::get('delete','delete')->name('city.delete');
            Route::get('edit/{id}','edit')->name('city.edit');
            Route::post('update/{id}','update')->name('city.update');
            Route::post('store','store')->name('city.store');

        });

        Route::controller(BecomeSellerController::class)->prefix('become-seller')->group(function(){

            Route::get('/','create')->name('become-seller.create');
            Route::put('update','update')->name('become-seller.update');

        });

    });

    Route::get('getStores',[StoreController::class,'cityStores'])->name('city.cityStores');
    // Route::get('getStores','cityStores')->name('city.cityStores');

    Route::get('update-country-flag',[CountryFlagController::class,'updateCountryFlag'])->name('country-flag');

});
