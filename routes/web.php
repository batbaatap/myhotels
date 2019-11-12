<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// admin 
// Route::group(['middleware' => ['auth']], function(){

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['adminlogin']], function () {

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::get('/ss', function () {
      return view('welcome');
    });

    // Booking
    Route::match(['get', 'post'], '/booking/add-booking',          'BookingController@addBooking');
    Route::match(['get', 'post'], '/booking/edit-booking/{id}',    'BookingController@editBooking');
    Route::match(['get', 'post'],'/booking/view-calendar', 'BookingController@viewCalendar');

  //   Route::bind('post', function ($value) {
  //     return App\Post::find($value)->where('status', '=', 'published')->first();
  // });
    

    Route::get('/booking/view-bookings',                           'BookingController@viewBookings');
    Route::get('/booking/delete-booking/{id}',                     'BookingController@deleteBooking');

    
    // Hotel
    Route::match(['get', 'post'], '/hotel/add-hotel',          'HotelController@addHotel');
    Route::match(['get', 'post'], '/hotel/edit-hotel/{id}',    'HotelController@editHotel');
    Route::get('/hotel/view-hotels',                           'HotelController@viewHotel');
    Route::get('/hotel/delete-hotel/{id}',                     'HotelController@deleteHotel');
    Route::get('/hotel/delete-hotel-image/{id}',               'HotelController@deleteHotelImage');
    
    
    // Room
    Route::match(['get', 'post'], '/room/add-room',          'RoomController@addRoom');
    Route::match(['get', 'post'], '/room/edit-room/{id}',    'RoomController@editRoom');
    Route::get('/room/view-rooms',                           'RoomController@viewRoom');
    Route::get('/room/delete-room/{id}',                     'RoomController@deleteRoom');

       
    // Facility
    Route::match(['get', 'post'], '/facility/add-facility',          'FacilityController@addFacility');
    Route::match(['get', 'post'], '/facility/edit-facility/{id}',    'FacilityController@editFacility');
    Route::get('/facility/view-facilities',                          'FacilityController@viewFacilities');
    Route::get('/facility/delete-facility-image/{id}',               'FacilityController@deleteFacImage');
    Route::get('/facility/delete-facility/{id}',                     'FacilityController@deleteFac');


    Route::get('dashboard', 'AdminController@dashboard');

    Route::get('settings', 'AdminController@settings');
    Route::get('check-pwd', 'AdminController@chkPassword');
    Route::match(['get','post'], 'update-pwd', 'AdminController@updatePassword');
    
    // Posts route
    Route::match(['get', 'post'], '/admin/add-post',               'PostController@addPost');
    Route::match(['get', 'post'], '/admin/edit-post/{id}',         'PostController@editPost');
    Route::get(                   '/admin/view-posts',             'PostController@viewPosts');
    Route::get(                   '/admin/delete-post-image/{id}', 'PostController@deletePostImage');
    Route::get(                   '/admin/delete-post/{id}',       'PostController@deletePost');


    // product
    Route::match(['get', 'post'], '/admin/add-product',               'ProductController@addProduct');
    Route::match(['get', 'post'], '/admin/edit-product/{id}',         'ProductController@editProduct');
    Route::get(                   '/admin/view-products',             'ProductController@viewProducts');
    Route::get(                   '/admin/delete-product-image/{id}', 'ProductController@deleteProductImage');
    Route::get(                   '/admin/delete-product/{id}',       'ProductController@deleteProduct');

    Route::match(['get', 'post'], '/admin/add-images/{id}','ProductController@addImages');

    Route::get('/admin/delete-alt-image/{id}','ProductController@deleteProductAltImage');


    // Category
    Route::match(['get', 'post'], '/admin/add-category',               'CategoryController@addCategory');
    Route::match(['get', 'post'], '/admin/edit-category/{id}',         'CategoryController@editCategory');
    Route::get(                   '/admin/view-categories',             'CategoryController@viewCategories');
    Route::get(                   '/admin/delete-category/{id}',       'CategoryController@deleteCategory');
    
   
    // Pages route
    Route::match(['get', 'post'], '/admin/add-page',               'PageController@addPage');
    Route::match(['get', 'post'], '/admin/edit-page/{id}',         'PageController@editPage');
    Route::get(                   '/admin/view-pages',             'PageController@viewPages');
    Route::get(                   '/admin/delete-page-image/{id}', 'PageController@deletePageImage');
    Route::get(                   '/admin/delete-page/{id}',       'PageController@deletePage');
   
    
    // banner
    Route::match(['get', 'post'], '/admin/add-banner', 'BannerController@addBanner');
    Route::match(['get', 'post'], '/admin/edit-banner/{id}',         'BannerController@editBanner');
    Route::get(                   '/admin/view-banners',             'BannerController@viewBanners');
    Route::get(                   '/admin/delete-banner-image/{id}', 'BannerController@deleteBannerImage');
    Route::get(                   '/admin/delete-banner/{id}',       'BannerController@deleteBanner');
    
    
    // info
    Route::match(['get', 'post'], '/admin/add-info',               'InfoController@addInfo');
    Route::match(['get', 'post'], '/admin/edit-info/{id}',         'InfoController@editInfo');
    Route::get(                   '/admin/view-infos',             'InfoController@viewInfos');
    Route::get(                   '/admin/delete-info-image/{id}', 'InfoController@deleteInfoImage');
    Route::get(                   '/admin/delete-info/{id}',       'InfoController@deleteInfo');
    
    
    // Hamt
    Route::match(['get', 'post'], '/admin/add-hamt',               'HamtController@addHamt');
    Route::match(['get', 'post'], '/admin/edit-hamt/{id}',         'HamtController@editHamt');
    Route::get(                   '/admin/view-hamts',             'HamtController@viewHamts');
    Route::get(                   '/admin/delete-hamt-image/{id}', 'HamtController@deleteHamtImage');
    Route::get(                   '/admin/delete-hamt/{id}',       'HamtController@deleteHamt');


    // Menu Routes (Admin)
    Route::match(['get', 'post'], '/admin/add-menu',         'MenuController@addMenu');
    Route::match(['get', 'post'], '/admin/edit-menu/{id}',   'MenuController@editMenu');
    Route::match(['get', 'post'], '/admin/delete-menu/{id}', 'MenuController@deleteMenu');
    Route::get('/admin/view-menus',                          'MenuController@viewMenus');
    Route::get(                   '/admin/delete-menu-image/{id}', 'MenuController@deleteImage');
    

      // Mnu
    Route::match(['get', 'post'], '/admin/add-mnu',               'MnuController@addMnu');
    Route::match(['get', 'post'], '/admin/edit-mnu/{id}',         'MnuController@editMnu');
    Route::get(                   '/admin/view-mnus',             'MnuController@viewMnus');
    Route::get(                   '/admin/delete-mnu-image/{id}', 'MnuController@deleteMnuImage');
    Route::get(                   '/admin/delete-mnu/{id}',       'MnuController@deleteMnu');


    // Admin Routes
    Route::group(['namespace' => 'Admin'],function(){ 
        // frontend-setup (Admin)
        Route::match(['get', 'post'], '/admin/frontend-setup', 'FrontsetupController@Frontsetup');
        Route::get('/admin/delete-logo/', 'FrontsetupController@deleteLogo');
        Route::get('/admin/delete-favicon/', 'FrontsetupController@deleteFavicon');
        
        Route::get('/admin/delete-promo-bg/', 'FrontsetupController@deletePromoBg');

        Route::get('/admin/deletebannersidebar/', 'FrontsetupController@deletebannersidebar');
    });
    
    // Route::group(['middleware' => 'auth'], function () {
    // Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    // Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
// });

});



// Visiter
Route::group(['as' => 'customer', 'namespace' => 'Customer'], function () {
 // home page
  Route::resource('/', 'HomeController');
 
  // hotel
  Route::match(['get', 'post'],'hotel/search', 'HotelController@hotelsearch');
  
 // room
  // Route::resource('room', 'RoomController');
  Route::match(['get', 'post'],'room/search', 'RoomController@roomsearch');
  
  // Booking
  Route::get('/booking/booking-details',  'BookingController@bookingDetails')->name('comment');
  Route::match(['get', 'post'], '/booking/payment',  'BookingController@payment');
  
});