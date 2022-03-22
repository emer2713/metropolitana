<?php
use Illuminate\Support\Facades\Route;
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}





Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

/*Home*/
Route::get('/', 'Blog\HomeController@getHome');


/*User-actions*/
Route::get('/account/edit',                         'UserController@getAccountEdit')                 ->name('account_edit');
Route::post('/account/avatar/edit',                 'UserController@postAccountAvatar')              ->name('account_avatar_edit');
Route::post('/account/password/edit',               'UserController@postPasswordEdit')               ->name('account_password_edit');
Route::post('/account/info/edit',                   'UserController@postInfoEdit')                   ->name('account_info_edit');
Route::get('/user-profile/{id}',                    ['as'=> 'user-profile',                         'uses' => 'UserController@user_profile']);
Route::get('/user-edit/{id}',                       ['as'=> 'user-edit',                            'uses' => 'UserController@user_edit']);
Route::post('/user-edit/{id}',                      ['as'=> 'user-edit',                            'uses' => 'UserController@user_edit']);

//Routes Auth
Route::get('/login',                                'ConnectController@getLogin')                   ->name('login');
Route::post('/login',                               'ConnectController@postLogin')                  ->name('login');

Route::get('/recover',                              'ConnectController@getRecover')                 ->name('recovery');
Route::post('/recover',                             'ConnectController@postRecover')                ->name('recovery');

Route::get('/reset',                                'ConnectController@getReset')                   ->name('reset');
Route::post('/reset',                               'ConnectController@postReset')                  ->name('reset');

Route::get('/register',                             'ConnectController@getRegister')                ->name('register');
Route::post('/register',                            'ConnectController@postRegister')               ->name('register');

Route::get('/logout',                               'ConnectController@getLogout')                  ->name('logout');

Route::get('login/{driver}',                        'ConnectController@redirectToProvider')         ->name('redirectToProvider');
Route::get('login/{driver}/callback',               'ConnectController@handleProviderCallback')     ->name('handleProviderCallback');

Route::get('/verification',                         'ConnectController@getVerification')                 ->name('verification');
Route::post('/verification',                        'ConnectController@postVerification')                ->name('verification');



/*Modules*/
Route::get('/cervezas/{slug}',                             'Blog\HomeController@getBeers')                 ->name('getBeers');
Route::get('/alimentos/{slug}',                            'Blog\HomeController@getFoods')                 ->name('getFoods');
Route::get('/mas-bebidas/{slug}',                          'Blog\HomeController@getDrinks')                ->name('getDrinks');
Route::get('/paquetes/{slug}',                             'Blog\HomeController@getPromotions')            ->name('getPromotions');
Route::get('/more-info/{slug}',                            'Blog\HomeController@getMedia')                 ->name('getMedia');

/*Producto-Detalle*/
Route::get('producto/{slug}',                       'Blog\HomeController@producto')                  ->name('producto');
Route::get('product/{id}',                          'Blog\HomeController@product')                   ->name('product');
Route::post('product/name/{id}',                    'Blog\HomeController@productname')              ->name('product.name');
Route::get('name/delete/{id}',                      'Blog\HomeController@getProductNameDelete')     ->name('post.deletede');

/*Filmografia*/
Route::get('/filmografia',                          'Blog\HomeController@filmografia')              ->name('filmografia');
Route::post('/descargar-contacto',                  'Blog\HomeController@pdf_contacto')             ->name('pdf.contacto');

/*Buscador*/
Route::get('/pdfin',                                'Blog\HomeController@pdfin')                    ->name('pdfin');
Route::get('/nombres/buscador',                     'Blog\HomeController@getNombres')               ->name('getNombres');


/*Cart-Market*/
Route::get('/cart/show',                            ['as'=> 'cart-show',                            'uses' => 'Admin\CartController@show']);
Route::get('/cart/delete/{sku}',                    ['as'=> 'cart-delete',                          'uses' => 'Admin\CartController@delete']);
Route::post('/cart/add-form/',                      ['as'=> 'cart-add-form',                        'uses' => 'Admin\CartController@add_form']);
Route::get('order-detail',                          ['middleware' => 'auth','as' => 'order-detail', 'uses' => 'Admin\CartController@orderDetail']);
Route::post('/cart/finish',                         ['as'=>'cart-finish',                           'uses' => 'Blog\HomeController@pdf_cotizacion']);
Route::get('/finalizado',                           ['as'=>'finalizado',                            'uses' => 'Blog\HomeController@finalizado']);
Route::get('/cotizaciones/{file}',                  ['as'=>'cotizaciones',                          'uses' => 'Blog\HomeController@cotizaciones']);
Route::get('/finalizar-cotizacion',                 ['as'=>'finalizar-cotizacion',                  'uses' => 'Blog\HomeController@finalizar_cotizacion']);
Route::post('/cart/add-filter/',                    ['as'=> 'cart-add-filter',                      'uses' => 'Admin\CartController@add_filter']);

Route::post('/carousel/mobile/add/{id}',            'Blog\HomeController@postCarouselMobileAdd')->name('carousels_add');
Route::get('/carousel/mobile/{id}/delete',          'Blog\HomeController@getCarouselMobileDelete')->name('carousels_delete');



//Carousel Add Admin
Route::post('/promotion/mobile/add/{id}',            'Blog\HomeController@postCarouselMobileAdd')->name('products_add');
Route::get('/promotion/mobile/{id}/delete',          'Blog\HomeController@getCarouselMobileDelete')->name('products_delete');

