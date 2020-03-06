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
Route::group(["prefix"=>"/"],function(){
	Route::get('/','Theme\RovaController@index')->name('web.index');
    Route::post('/post_mail','Theme\RovaController@post_mail')->name('web.post_mail');
    Route::get('danh-muc/{url}','Theme\RovaController@categories')->name('web.categories');
    Route::get('tags/{url}','Theme\RovaController@tags')->name('web.tags');
    Route::get('gioi-thieu/{id}','Theme\RovaController@aboutUs')->name('web.about.us');
    Route::get('lien-he','Theme\RovaController@contact')->name('web.contact');
    Route::get('chi-tiet/{id}','Theme\RovaController@chi_tiet')->name('web.chi_tiet');
    Route::get('san-pham/{id}','Theme\RovaController@san_pham')->name('web.san_pham');
    Route::get('bai-viet/{id}','Theme\RovaController@chi_tiet_tin')->name('web.chi_tiet_tin');
    Route::get('chuong-trinh-khuyen-mai','Theme\RovaController@client')->name('web.client');
    Route::get('chi-tiet-tin/{id}','Theme\RovaController@show_post')->name('web.show_post');
    Route::get('gio-hang','Theme\RovaController@cart')->name('web.cart');
    Route::get('thanh-toan','Theme\RovaController@payment')->name('web.payment');
    Route::get('tin-tuc/{id}','Theme\RovaController@post')->name('web.post');
    // Route::get('parador/{url}.html','Theme\RovaController@post')->name('web.post');
//    Route::get('san-go-parador','Theme\RovaController@products')->name('web.products');
//    Route::get('san-go-parador/{url}.html','Theme\RovaController@product')->name('web.product');
//    Route::get('san-go-parador-cao-cap/{url}.html','Theme\RovaController@productCate')->name('web.product.category');
//    Route::get('dai-ly-parador','Theme\RovaController@agents')->name('web.agents');
    Route::post('data-for-contact','Theme\RovaController@contactPost')->name('web.contact.post');
    Route::get('ho-tro-khach-hang','Theme\RovaController@member')->name('web.member');
    Route::get('loi-khong-tim-thay-trang-404','Theme\RovaController@error')->name('web.error');
    Route::get('update-cart','Theme\RovaController@updateCart')->name('web.update.cart');
    Route::get('remove-cart','Theme\RovaController@removeCart')->name('web.remove.cart');
});
Route::get('component/slider','ComponentController@slider')->name('components.slider');
/**
 *Backend adminstrator
**/
Auth::routes();
// view onlypage
	Route::get('admin/dashboard', 'HomeController@index')->name('dashboard');
	Route::get('admin/', 'HomeController@index')->name('admin');

Route::group(['prefix'=>'admin/','middleware' => ['auth']],function(){
//    user route
    Route::get('users','UserController@index')->name('user.list');
    Route::get('user/{id}','UserController@show')->name('user.show');
    Route::get('user/edit/{id}','UserController@edit')->name('user.edit');
    Route::get('user/delete/{id}','UserController@delete')->name('user.delete');
    Route::post('user/{id}','UserController@update')->name('user.update');
    Route::post('users','UserController@store')->name('user.store');
// manager file and backend custom
    Route::get('manager-file', 'BackendController@managerFile')->name('manager.file');
    Route::get('command', 'BackendController@runCommand')->name('command');
    Route::post('command', 'BackendController@postCommand')->name('command');
    Route::get('hoang-config/google-analytic','BackendController@google')->name('hoang.google');
    Route::get('hoang-config/facebook-pixel','BackendController@facebook')->name('hoang.facebook');
    Route::get('hoang-config/javascript','BackendController@javascript')->name('hoang.javascript');

//	config role of user
    Route::get('roles','RoleController@index')->name('roles.index');
    Route::get('roles/{id}/edit','RoleController@edit')->name('roles.edit');
    Route::get('roles/create','RoleController@create')->name('roles.create');
    Route::get('roles/{id}','RoleController@show')->name('roles.show');
    Route::get('roles/{id}','RoleController@destroy')->name('roles.destroy');
    Route::post('roles','RoleController@store')->name('roles.store');
    Route::post('roles/{id}','RoleController@update')->name('roles.update');
    Route::get('roles/error/403','RoleController@error')->name('roles.error');
	// Restfull function
	Route::resource('posts', PostsController::class);
    Route::get('slider','SlidersController@index')->name('slider.index');
    Route::post('slider-create','SlidersController@create')->name('slider.create');
    Route::get('slider-delete/{id}','SlidersController@destroy')->name('slider.destroy');
    Route::get('logo','LogosController@index')->name('logo.index');
    Route::post('logo-create','LogosController@create')->name('logo.create');
    Route::get('logo-delete/{id}','LogosController@destroy')->name('logo.destroy');
	Route::resource('pages', PagesController::class);
	Route::resource('products', ProductsController::class);
    Route::post('products/list-images','ProductsController@images')->name('products.images');
    Route::post('products/update-images/{id}','ProductsController@updateImages')->name('products.update.image');
    Route::get('products/images/delete/{id}','ProductsController@deleteImages')->name('products.image.delete');
    Route::get('products/edit-deal/{id}','ProductsController@editDeal')->name('products.edit.deal');


    Route::resource('categories', CategoriesController::class);
	Route::resource('tags', TagsController::class);
	Route::resource('menus', MenusController::class);
   // Route::get('menu-items/delete/{$id}','BackendController@deleteMenuItem')->name('menu-items.delete');

    Route::resource('menu-items', MenuItemsController::class);
	Route::resource('homes', HomesController::class);
	Route::resource('comments', CommentsController::class);
	Route::resource('configs', ConfigsController::class);
    Route::resource('contacts', ContactsController::class);


    Route::resource('events', EnventsController::class);
    Route::resource('members', MembersController::class);

    Route::resource('students', StudentsController::class);
    Route::resource('teachers', TeachersController::class);

    Route::resource('courses', CoursesController::class);
    Route::resource('lessons', LessonsController::class);
});