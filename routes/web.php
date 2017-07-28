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
    
    use Illuminate\Support\Facades\Route;
    
    /*
    |--------------------------------------------------------------------
    | Public routes
    |--------------------------------------------------------------------
    |
    | These routes are accessible to both non-authenticated users and
    | authenticated users.
    |
    */
    
    // Login-related routes ==============================================.
    Auth::routes();

    

    // Menu-related routes ==============================================.
    Route::get('/', 'HomeController@index');

    // Pages-related routes ==============================================.
    Route::get('{pages}', 'PagesController@show');

// Search routes =========================================.
Route::resource('search', 'SearchController');

    
    /*
    |--------------------------------------------------------------------
    | Administrator role routes
    |--------------------------------------------------------------------
    */
    Route::group(['prefix' => 'admin'], function () {
        
        Auth::routes();
        Route::get('home', 'AdminController@index');

        // Users-related routes =========================================.
        Route::resource('users', 'UsersController');

        // Pages-related routes =========================================.
        Route::resource('pages', 'PagesController');
        Route::resource('components', 'ComponentController');
        


	    
        // System-related routes ========================================.
        Route::resource('settings', 'ConfigController');
        

    });




