<?php

use Laraning\DAL\Models\Video;
use Illuminate\Support\Facades\Auth;
use Laraning\Wave\Notifications\VideoTutorialPublished;

Route::redirect('/', '/wave/login');

Route::get('login', 'Features\Login\Controllers\LoginController@showLoginForm')
       ->name('wave.login');

Route::post('login', 'Features\Login\Controllers\LoginController@login');

Route::get('logout', function () {
    Auth::guard('wave')->logout();
    session()->invalidate();
    return redirect('/wave');
});

/** Super admin operations ACL **/
Route::group(['middleware' => ['wave.role:super-admin']], function () {
    Route::get('home', 'Features\Home\Controllers\HomeController@index')
       ->name('wave.home');

    Route::resource(
        'series',
        'Features\Series\Manage\Controllers\SeriesController',
        ['names' => wave_resource_prefix('series')]
    );

    Route::resource(
        'videos',
        'Features\Video\Manage\Controllers\VideoController',
        ['names' => wave_resource_prefix('videos')]
    );

    Route::resource(
        'videos_publish',
        'Features\Video\Publish\Controllers\FeatureController',
        ['names' => wave_resource_prefix('videos_publish')]
    );

    Route::post('plugins/froala/upload_file', 'Controllers\Wysiwyg@uploadFile')->name('wave.froala.file.upload');
});
