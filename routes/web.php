<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\KaryawanController;

Route::get('/', 'LoginController@login')->name('login');
Route::post('loginaksi', 'LoginController@loginaksi')->name('loginaksi');
Route::get('home', 'HomeController@index')->name('home');
Route::get('reimbust', 'HomeController@reimbust')->name('reimbust');
Route::get('karyawan', 'HomeController@karyawan')->name('karyawan');
Route::get('direktur', 'HomeController@direktur')->name('direktur');
Route::get('staff', 'HomeController@staff')->name('staff');
Route::post('store', 'ReimbursementController@store')->name('store');
Route::get('terima/{id}', 'ReimbursementController@terima')->name('terima');
Route::get('tolak/{id}', 'ReimbursementController@tolak')->name('tolak');
Route::post('tambah_karyawan', 'KaryawanController@tambah_karyawan')->name('tambah_karyawan');
Route::get('edit_karyawan/{id}', 'KaryawanController@edit_karyawan')->name('edit_karyawan');
Route::post('update_karyawan/{id}', 'KaryawanController@update_karyawan')->name('update_karyawan');
Route::get('hapus_karyawan/{id}', 'KaryawanController@hapus_karyawan')->name('hapus_karyawan');
Route::get('edit/{id}', 'KaryawanController@edit')->name('edit');
Route::get('tolak/{id}', 'ReimbursementController@tolak')->name('tolak');
Route::get('logoutaksi', 'LoginController@logoutaksi')->name('logoutaksi')->middleware('auth');