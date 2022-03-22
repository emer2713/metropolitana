<?php

Route::prefix('/admin')->group(function(){

    Route::get('/',                                         'Admin\DashboardController@getDashboard')->name('dashboard');

    //Module Users
    Route::get('/users/{status}',                           'Admin\UserController@getUsers')->name('user_list');
    Route::get('/user/{id}/edit',                           'Admin\UserController@getUserEdit')->name('users_edit');
    Route::post('/user/{id}/edit',                          'Admin\UserController@postUserEdit')->name('users_edit');
    Route::get('/user/{id}/banned',                         'Admin\UserController@getUserBanned')->name('users_banned');
    Route::get('/user/{id}/permissions',                    'Admin\UserController@getUserPermissions')->name('users_permissions');
    Route::post('/user/{id}/permissions',                   'Admin\UserController@postUserPermissions')->name('users_permissions');

    //Module Classifications
    Route::get('/classifications',                       'Admin\ClassificationsController@getHome')->name('classifications');
    Route::post('/classification/add',                   'Admin\ClassificationsController@postclassificationAdd')->name('classifications_add');
    Route::get('/classification/{id}/edit',              'Admin\ClassificationsController@getclassificationEdit')->name('classifications_edit');
    Route::post('/classification/{id}/edit',             'Admin\ClassificationsController@postclassificationEdit')->name('classifications_edit');
    Route::get('/classification/{id}/delete',            'Admin\ClassificationsController@getclassificationDelete')->name('classifications_delete');


    //Module Subclassifications
    Route::get('/subclassifications',                       'Admin\SubclassificationsController@getHome')->name('subclassifications');
    Route::post('/subclassification/add',                   'Admin\SubclassificationsController@postSubclassificationAdd')->name('subclassifications_add');
    Route::get('/subclassification/{id}/edit',              'Admin\SubclassificationsController@getSubclassificationEdit')->name('subclassifications_edit');
    Route::post('/subclassification/{id}/edit',             'Admin\SubclassificationsController@postSubclassificationEdit')->name('subclassifications_edit');
    Route::get('/subclassification/{id}/delete',            'Admin\SubclassificationsController@getSubclassificationDelete')->name('subclassifications_delete');


    //Module Carousels
    Route::get('/carousels',                                'Admin\CarouselsController@getHome')->name('carousels');
    Route::post('/carousel/add',                            'Admin\CarouselsController@postCarouselAdd')->name('carousels_add');
    Route::get('/carousel/{id}/edit',                       'Admin\CarouselsController@getCarouselEdit')->name('carousels_edit');
    Route::post('/carousel/{id}/edit',                      'Admin\CarouselsController@postCarouselEdit')->name('carousels_edit');
    Route::get('/carousel/{id}/delete',                     'Admin\CarouselsController@getCarouselDelete')->name('carousels_delete');


    //Module multimedia
    Route::get('/multimedia',                            'Admin\FilmographiesController@getHome')->name('multimedia');
    Route::post('/multimedia/add',                         'Admin\FilmographiesController@postFilmographyAdd')->name('multimedia_add');
    Route::get('/multimedia/{id}/edit',                    'Admin\FilmographiesController@getFilmographyEdit')->name('multimedia_edit');
    Route::post('/multimedia/{id}/edit',                   'Admin\FilmographiesController@postFilmographyEdit')->name('multimedia_edit');
    Route::get('/multimedia/{id}/delete',                  'Admin\FilmographiesController@getFilmographyDelete')->name('multimedia_delete');


    
     //Beers Module
     Route::get('/beers/{status}',                            'Admin\ProductsController@getBeersHome')->name('beers');
     Route::get('/beer/add',                                'Admin\ProductsController@getBeerAdd')->name('beers_add');
     Route::post('/beer/add',                               'Admin\ProductsController@postBeerAdd')->name('beers_add');
     Route::get('/beer/{id}/edit',                          'Admin\ProductsController@getBeerEdit')->name('beers_edit');
     Route::post('/beer/{id}/edit',                         'Admin\ProductsController@postBeerEdit')->name('beers_edit');
     Route::get('/beer/{id}/delete',                         'Admin\ProductsController@getBeerDelete')->name('beers_delete');
     Route::get('/beer/{id}/restore',                        'Admin\ProductsController@getBeerRestore')->name('beers_delete');



    //Foods
    Route::get('/foods/{status}',                            'Admin\ProductsController@getFoodsHome')->name('foods');
    Route::get('/food/add',                                'Admin\ProductsController@getFoodAdd')->name('foods_add');
    Route::post('/food/add',                               'Admin\ProductsController@postFoodAdd')->name('foods_add');
    Route::get('/food/{id}/edit',                          'Admin\ProductsController@getFoodEdit')->name('foods_edit');
    Route::post('/food/{id}/edit',                         'Admin\ProductsController@postFoodEdit')->name('foods_edit');
    Route::get('/food/{id}/delete',                        'Admin\ProductsController@getFoodDelete')->name('foods_delete');
    Route::get('/food/{id}/restore',                       'Admin\ProductsController@getFoodRestore')->name('foods_delete');

    //Drinks Module
    Route::get('/drinks',                               'Admin\ProductsController@getDrinkAdd')->name('drinks_add');
    Route::post('/drink/add',                              'Admin\ProductsController@postDrinkAdd')->name('drinks_add');
    Route::get('/drink/{id}/edit',                         'Admin\ProductsController@getDrinkEdit')->name('drinks_edit');
    Route::post('/drink/{id}/edit',                        'Admin\ProductsController@postDrinkEdit')->name('drinks_edit');
    Route::get('/drink/{id}/delete',                       'Admin\ProductsController@getDrinkDelete')->name('drinks_delete');
    Route::get('/drink/{id}/restore',                      'Admin\ProductsController@getDrinkRestore')->name('drinks_delete');

    //Promotions Module
    Route::get('/promotions',                               'Admin\ProductsController@getPromotions')->name('promotions');
    Route::post('/promotion/add',                          'Admin\ProductsController@postPromotionAdd')->name('promotions_add');
    Route::get('/promotion/edit/{id}',                     'Admin\ProductsController@getPromoEdit')->name('promotions_edit');
    Route::post('/promotion/edit/{id}',                    'Admin\ProductsController@postPromoEdit')->name('promotions_edit');
    Route::get('/promotion/{id}/delete',                   'Admin\ProductsController@getPromotionDelete')->name('promotions_delete');
    Route::get('/promotion/{id}/restore',                  'Admin\ProductsController@getPromotionRestore')->name('promotions_delete');


    //Module Categories
    Route::get('/categories/{module}',                      'Admin\CategoriesController@getHome')->name('categories');
    Route::post('/category/add',                            'Admin\CategoriesController@postCategoryAdd')->name('categories_add');
    Route::get('/category/{id}/edit',                       'Admin\CategoriesController@getCategoryEdit')->name('categories_edit');
    Route::post('/category/{id}/edit',                      'Admin\CategoriesController@postCategoryEdit')->name('categories_edit');
    Route::get('/category/{id}/delete',                     'Admin\CategoriesController@getCategoryDelete')->name('categories_delete');

});
