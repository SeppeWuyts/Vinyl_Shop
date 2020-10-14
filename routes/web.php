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

Route::view('/', 'home');

Route::get('contact-us', function () {
    //return 'Contact info';
    return view('contact');
});

// Old version
/*
Route::get('admin/records', function (){...});
*/

// New version with prefix and group
/*Route::prefix('admin')->group(function () {
    Route::redirect('/', '/admin/records');
    Route::get('records', function (){
        $records = [
            'Queen - <b>Greatest Hits</b>',
            'The Rolling Stones - Sticky Fingers',
            'The Beatles - Abbey Road'
        ];
        return view('admin.records.index', [
            'records' => $records
        ]);
    });
});
*/

Route::prefix('admin')->group(function () {
    Route::redirect('/', 'records');
    Route::get('records', 'Admin\RecordController@index');
});
