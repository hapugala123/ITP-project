<?php
Route::get('/', function () { return redirect('/admin/home'); });
//Registration
$this->get('register', 'Auth\RegisterController@showRegistrationForm');
$this->post('register', 'Auth\RegisterController@register');
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->get('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('purchases', 'Admin\PurchasesController');
    Route::post('purchases_mass_destroy', ['uses' => 'Admin\PurchasesController@massDestroy', 'as' => 'purchases.mass_destroy']);
    Route::post('purchases_restore/{id}', ['uses' => 'Admin\PurchasesController@restore', 'as' => 'purchases.restore']);
    Route::delete('purchases_perma_del/{id}', ['uses' => 'Admin\PurchasesController@perma_del', 'as' => 'purchases.perma_del']);



 
});

Route::get('/welcome', 'HomeController@welcome');
Route::get('/profile', 'HomeController@profile');
Route::patch('customers/{customer}/update',  ['as' => 'customers.update', 'uses' => 'ProfileController@update']);
Route::get('customers/{customer}/delete',  ['uses' => 'Admin\UsersController@destroy']);

Auth::routes();