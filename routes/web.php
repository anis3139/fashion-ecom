<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\customer_info;
use App\order;
use App\Categores;

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

Route::get('/', 'FrontController@index');
// Route::get('/headerNave', 'FrontController@headerNave');
Route::get('/mobile', 'FrontController@mobile');
Route::get('/mobile/load-more-data', 'FrontController@more_data');
Route::get('/mobile_subcategory', 'FrontController@mobile_subcategory');

Route::get('/about', 'FrontController@about');
Route::get('/privice', 'FrontController@privice');
Route::get('/trems', 'FrontController@trems');
Route::get('/prductView/{slug}', 'FrontController@prductView');
Route::get('/shop', 'FrontController@shop');

Route::get('/category/{sub_cat_slug}', 'FrontController@underSubCat')->name('under.sub.cat');
Route::get('/category/{cat_slug}/{sub_cat_slug}', 'FrontController@sub_category')->name('second.category');
Route::get('/category/{cat_slug}/{sub_cat_slug}/{third_slug}', 'FrontController@subCategoryLast')->name('third.category');

Route::get('hot-deal-products', 'FrontController@getHotDealProduct')->name('hot.deal.products');

Route::get('/service', 'FrontController@service');
Route::get('/cart', 'FrontController@cart')->name('cart');
Route::get('/cart/{coupon_name}', 'FrontController@cart');

Route::get('/contract', 'FrontController@contact');
Route::get('/cartSave/{id}/{productAttrValue}', 'FrontController@cartSave');
Route::get('/order-now/{id}', 'FrontController@orderNow');

Route::post('/cartUpdate', 'FrontController@cartUpdate');
Route::get('/cartDelete/{id}', 'FrontController@cartDelete');
Route::get('/refriend', 'FrontController@refriend');
Route::get('/category-view-product/{id}', 'FrontController@categoryViewProduct');
Route::get('/category/{slug}', 'FrontController@singleCategory');

Route::post('/filter', 'FrontController@filter');

Route::get('/customer/invoice/{invoice}', 'AddController@customerInvoice')->name('customer.invoice');
Route::get('/invoice/{invoice}', 'AddController@invoice');
Route::get('/invoice-print/{invoice}', 'AddController@invoicePrint')->name('invoice.print');

//CheckoutController
Route::get('/payment', 'CheckoutController@payment')->name('customer-payment');
Route::post('/savePayment', 'CheckoutController@savePayment');

Route::POST('/checkoutValue', 'CheckoutController@checkoutValue')->name('checkoutValue');
Route::POST('/cityView', 'CheckoutController@cityView');
Route::POST('/orderSave', 'CheckoutController@orderSave');
Route::POST('/trackingPoduct/{id}', 'CheckoutController@trackingPoduct');

Route::get('/cartCount', 'FrontController@cartCount');
Route::get('/search', 'SearchController@search');
Route::post('/autosearch', 'SearchController@autosearch');

Route::post('/quickOrderSave', 'FrontController@quickOrderSave');
Route::post('/trackingOrder', 'FrontController@trackingOrder');
Route::get('/countSave', 'FrontController@countCart');

Route::get('customer-register', 'FrontController@customerRegister')->name('user.customer.register');

// roust for Front pages
Route::get('/customer_login', 'FrontController@customer_login')->name('customer_login');

///below customer register save
Route::resource('/ucomplaint', 'ComplaintController');
Route::get('/ordercomplite', 'FrontController@ordercomplite');

// Route::post('/ucomplaint', 'ComplaintController@store');
Route::get('/trackorder', 'FrontController@trackorder');
Route::get('/tracking-product-value/{invoiceNumber}', 'FrontController@trackValue');

Route::get('/order_format', 'FrontController@order_format');
Route::get('/shiping', 'FrontController@shiping')->name('shiping');

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::post('/catDown', 'HomeController@catDown');
Route::post('/catUp', 'HomeController@catUp');
Route::post('/promoteImage', 'HomeController@promoteImage');
Route::get('/addPromo/{id}', 'HomeController@addPromo');
// add categories route


Route::middleware(['auth', 'Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});


// Route::get('/allcates', 'AllCategory@index');
Route::get('/edit-category', 'AllCategory@edit');
Route::get('/profile', 'UserController@index');
Route::get('/addCates', 'UserController@addcate');
///category
Route::get('/allcates', 'admin\CategoryController@categoryIndex');
Route::post('/categorySave', 'admin\CategoryController@categorySave');
Route::get('/categoryEdit/{id}', 'admin\CategoryController@categoryEdit');
// Route::PUT('/categoryUpdate/{id}', 'admin\CategoryController@categoryUpdate');
Route::post('/categoryUpdate', 'admin\CategoryController@categoryUpdate');
Route::get('/categoryDelete/{id}', 'admin\CategoryController@categoryDelete');
Route::get('/subCategory/{id}', 'admin\CategoryController@subCategory');
Route::post('/subCategorySave', 'admin\CategoryController@subCategorySave');
Route::post('/subCategorySave1', 'admin\CategoryController@subCategorySave1');
Route::get('/subCategorySaveee', 'admin\CategoryController@subCategorySaveee');
Route::get('/subCategoryEdit/{id}', 'admin\CategoryController@subCategoryEdit');
Route::PUT('/subCategoryUpdate/{id}', 'admin\CategoryController@subCategoryUpdate');
Route::get('/subCategoryDelete/{id}', 'admin\CategoryController@subCategoryDelete');
Route::get('/thirdCategory/{id}', 'admin\CategoryController@thirdCategory');
Route::post('/thirdCategorySave', 'admin\CategoryController@thirdCategorySave');
Route::get('/thirdCategoryView', 'FrontController@thirdCategoryView');
Route::post('/thirdCategorySaver', 'FrontController@thirdCategorySaver');
Route::get('/thirdCategoryEdit/{id}', 'admin\CategoryController@thirdCategoryEdit');
Route::PUT('/thirdCategoryUpdate/{id}', 'admin\CategoryController@thirdCategoryUpdate');
Route::get('/thirdCategoryDelete/{id}', 'admin\CategoryController@thirdCategoryDelete');
////
Route::POST('/categoryTosub', 'admin\CategoryController@categoryTosub');
Route::POST('/subCategoryTothird', 'admin\CategoryController@subCategoryTothird');


////all product


//logo
// Route::resource('/logo', 'LogoController');

///coupon

Route::get('/coupon', 'admin\MainController@coupon');
Route::get('/couponDelete/{id}', 'admin\MainController@couponDelete');
Route::post('/couponSave', 'admin\MainController@couponSave');

///customer Register savew
// Route::post('/customerSave', 'admin\MainController@customerSave');
Route::post('/buyInfo', 'admin\MainController@buyInfo');


////seller Information all route

Route::get('/all-seller', 'SellerController@sellerIndex');
Route::get('/seller-info/{userName}', 'SellerController@sellerInfo');
Route::post('/paymentSave', 'SellerController@paymentSave');

// Admin Banner Routes

// Route::match(['get','post'], '/add-banner', 'BannersController@addBanner');
Route::get('/add-banner', 'BannersController@addBanner');
Route::post('/bannerSave', 'BannersController@bannerSave');
Route::get('/bannerDelete/{id}', 'BannersController@bannerDelete');
Route::resource('/comments', 'CommentController');
Route::resource('/logo', 'LogoController');

//site information
Route::get('/site-info', 'BannersController@siteInfoIndex')->name('site.info.index');
Route::post('/site-info-store', 'BannersController@siteInfoStore')->name('site.info.store');
Route::post('/site-info-update/{id}', 'BannersController@siteInfoUpdate')->name('site.info.update');
Route::get('/site-info-destroy/{id}', 'BannersController@siteInfoDestroy')->name('site.info.destroy');

//site description
Route::get('/site-description', 'BannersController@siteDesciptionIndex')->name('site.description.index');
Route::post('/site-description-store', 'BannersController@siteDesciptionStore')->name('site.description.store');
Route::post('/site-description-update/{id}', 'BannersController@siteDesciptionUpdate')->name('site.description.update');

//order management
Route::get('/order', 'admin\MainController@order');
Route::get('/userData/{id}', 'admin\MainController@userDataViewer');
Route::post('/userDataUpdate', 'admin\MainController@userDataUpdate');
Route::post('/orderDown', 'admin\MainController@orderDown');
Route::post('/orderUp', 'admin\MainController@orderUp');
Route::post('/orderPoductStatus', 'admin\MainController@orderPoductStatus');
Route::post('/changeArea', 'admin\MainController@changeAreaByAdmin')->name('change.area');
Route::get('order-destroy/{id}', 'admin\MainController@orderDestroy')->name('order.destroy');

//report management
Route::get('/dailySell', 'admin\ReportController@dailySell');
Route::get('/dailySellIndex/{date}', 'admin\ReportController@dailySellIndex');
Route::get('/monthlySell', 'admin\ReportController@monthlySell');
Route::get('/monthlySellIndex/{year}/{month}', 'admin\ReportController@monthlySellIndex');

//customer
Route::get('/all-customer', 'AddController@customerIndex');

//seller

//editor
Route::get('/indexEditor', 'admin\EditorController@indexEdit');
Route::post('/saveEditor', 'admin\EditorController@saveEditor');
Route::get('/editorDelete/{id}', 'admin\EditorController@editorDelete');


Route::group(['namespace' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/product', 'ProductController@index');
    Route::get('/productIndex', 'ProductController@productIndex')->name('productIndex');
    Route::get('/productAttr/{id}', 'ProductController@productAttr');
    Route::get('/destroy-product-size/{id}', 'ProductController@destroyProductSize')->name('destroy.product.size');
    Route::post('/sizeName', 'ProductController@sizeName');
    Route::post('/productAttrSave', 'ProductController@productAttrSave');
    Route::post('/productSave', 'ProductController@productSave');
    Route::get('/productEdit/{id}', 'ProductController@productEdit');
    // edit multiple image
    Route::get('edit-multiple-image/{id}', 'ProductController@editMultipleImage')->name('edit.multiple.image');
    Route::post('update-multiple-image/{id}', 'ProductController@updateMultipleImage')->name('update.multiple.image');

    Route::post('/productUpdate/{id}', 'ProductController@productUpdate');
    Route::get('/productDelete/{id}', 'ProductController@productDelete');
    Route::get('/approveProduct', 'ProductController@approveProduct');
    Route::post('/productapprove', 'ProductController@productapprove');

    Route::post('product-details-update/{productDetails}', 'ProductController@productDetailsUpdate')->name('product.details.update');
    Route::post('product-details-delete/{productDetails}', 'ProductController@productDetailsDelete')->name('product.details.delete');

    Route::get('/promoteProduct/{id}', 'ProductController@promoteProduct');
    Route::get('/depromoteProduct/{id}', 'ProductController@depromoteProduct');

    //customer message
    Route::get('customer-message', 'CustomerMessagesController@getCustomerMessage')->name('customer.message');
    Route::get('customer-message-destroy/{id}', 'CustomerMessagesController@destroyCustomerMessage')->name('customer.message.destroy');
});

////customer-dashboard
Route::get('/customer-dashboard', 'CustomerController@customerDashboard')->name('customer-dashboard');
Route::PUT('/updatePassword', 'CustomerController@updatePassword');
Route::post('/customerSaveForm', 'FrontController@customerSaveForm');
Route::post('/customer-update-form/{id}', 'FrontController@customerUpdateForm')->name('customer.update.form');

//seller dasshboard
Route::get('/seller-dashboard', 'seller\SellerDashboardController@sellerDashboard')->name('seller-dashboard');
Route::get('/seller-login', 'seller\SellerDashboardController@login');
Route::get('/seller-register', 'seller\SellerDashboardController@register');
Route::post('/sellerRegisterSave', 'seller\SellerDashboardController@sellerRegisterSave');

Route::get('/seller-forgot-password', 'seller\SellerDashboardController@forgot_password');

Route::get('/seller-product', 'seller\SellerDashboardController@sellerProduct')->name('seller-product');
Route::get('/seller-product-add', 'seller\SellerDashboardController@sellerProductAdd');
Route::post('/sellerProductSave', 'seller\SellerDashboardController@sellerProductSave');
Route::get('/sellerProductDelete/{id}', 'seller\SellerDashboardController@sellerProductDelete');

Route::post('/categorySellerTosub', 'seller\SellerDashboardController@categorySellerTosub');
Route::post('/subCategorySellerTothird', 'seller\SellerDashboardController@subCategorySellerTothird');

Route::get('/sellerProductAttr/{id}', 'seller\SellerDashboardController@sellerProductAttr');
Route::post('/sellerProductAttrSave', 'seller\SellerDashboardController@sellerProductAttrSave');
Route::post('/sizeNameseller', 'seller\SellerDashboardController@sizeNameseller');
Route::get('/sellerProductAttrDelete/{id}', 'seller\SellerDashboardController@sellerProductAttrDelete');
Route::get('/sellerProductEdit/{id}', 'seller\SellerDashboardController@sellerProductEdit');
Route::post('/sellerProductupdate/{id}', 'seller\SellerDashboardController@sellerProductupdate');
Route::get('/seller-information', 'seller\SellerDashboardController@sellerInformation');
Route::post('/sellerInfoSave', 'seller\SellerDashboardController@sellerInfoSave');
Route::get('/affiliate', 'seller\SellerDashboardController@affiliate');
Route::post('/affiliateSave', 'seller\SellerDashboardController@affiliateSave');
Route::get('/sellerPayment', 'seller\SellerDashboardController@sellerPayment');

//store customer message
Route::post('/store-customer-message', 'FrontController@storeCustomerMessage')->name('store.customer.message');

//note down order
Route::get('order-note/{id}', 'admin\OrderNoteController@index')->name('order.note');
Route::post('store-order-note', 'admin\OrderNoteController@store')->name('store.order.note');
Route::get('destroy-order-note/{id}', 'admin\OrderNoteController@destroy')->name('destroy.order.note');

/////testing
Route::get('/test', 'FrontController@test');
Route::post('/testSave', 'FrontController@testSave');
Route::get('/allcategorynav', 'FrontController@allcategorynav');
