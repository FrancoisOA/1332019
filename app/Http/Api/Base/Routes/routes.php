<?php
Route::group(['prefix' => 'files'], function (){
    Route::get('download/{module}/{path}', 'FileController@download')->name('download-file');
    Route::get('preview/{module}/{path}', 'FileController@preview')->name('preview-file');
});