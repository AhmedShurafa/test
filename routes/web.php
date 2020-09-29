<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/','Admin\UserInfoController@index')->name('main');
Route::get('/{local}', 'Admin\UserInfoController@language')->name('lang');

Route::post('/File', 'DownloadesController@down')->name('file');


Route::prefix('admin/')->namespace('Admin\\')->name('admin.')->group(function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/edit/{id}','UserInfoController@edit')->name('edit');
    Route::PUt('update/{id}','UserInfoController@update')->name('home.update');

    Route::PUt('update/Qr/{id}','UserInfoController@resizeImagePost')->name('home.UpdateQr');

    Route::get('Resume/','ResumeController@index')->name('resume');
    Route::get('Resume/Add','ResumeController@create')->name('resume.add');
    Route::post('Resume/store','ResumeController@store')->name('resume.store');

    Route::get('Resume/edit/Edu/{id}','ResumeController@Education')->name('resume.edit.edu');
    Route::post('Resume/update/{id}','ResumeController@update')->name('resume.update');
    Route::delete('Resume/delete/Edu/{id}','ResumeController@delEducation')->name('resume.del.edu');

    Route::get('Resume/edit/Exp/{id}','ResumeController@Experiences')->name('resume.edit.exp');
    Route::delete('Resume/delete/Exp/{id}','ResumeController@deleExperiences')->name('resume.del.exp');

    Route::get('Resume/edit/Skills/{id}','ResumeController@Skills')->name('resume.edit.skill');
    Route::delete('Resume/delete/Skills/{id}','ResumeController@deleSkills')->name('resume.del.skill');

    Route::get('Resume/edit/mSkills/{id}','ResumeController@More')->name('resume.edit.more');
    Route::delete('Resume/delete/mSkills/{id}','ResumeController@deleMore')->name('resume.del.more');

    Route::get('Services/','ServicesController@index')->name('services');
    Route::get('Services/Add','ServicesController@create')->name('services.add');
    Route::post('Services/store','ServicesController@store')->name('services.store');

    Route::post('Services/update/{id}','ServicesController@update')->name('services.update');

    Route::get('services/edit/{id}','ServicesController@services')->name('services.edit');
    Route::delete('services/delete/{id}','ServicesController@delservices')->name('services.del');

    Route::delete('services/Client/delete/{id}','ServicesController@delClient')->name('client.del');

    Route::get('services/edit/test/{id}','ServicesController@test')->name('services.edit.test');
    Route::delete('services/delete/test/{id}','ServicesController@deleTest')->name('services.del.test');

    Route::get('Portfolio/','PortfolioController@index')->name('portfolio');
    Route::get('Portfolio/Add','PortfolioController@create')->name('portfolio.add');
    Route::post('portfolio/store','PortfolioController@store')->name('portfolio.store');
    Route::get('portfolio/edit/{id}','PortfolioController@edit')->name('portfolio.edit');

    Route::post('portfolio/update/{id}','PortfolioController@update')->name('portfolio.update');

    Route::delete('portfolio/delete/{id}','PortfolioController@destroy')->name('portfolio.del');

});
