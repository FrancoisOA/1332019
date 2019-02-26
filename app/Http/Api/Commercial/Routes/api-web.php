<?php
Route::group(['prefix' => 'base'], function ()
{
    Route::post('upload-file', 'FileCommentController@store');
});

Route::group(['prefix' => 'commercial'], function ()
{
    Route::group(['prefix' => 'customer-tracking'], function ()
    {
        Route::resource('clients', 'ClientController')->only(['store', 'edit', 'update']);
        Route::resource('comments', 'CommentController')->only(['store', 'update']);
        Route::get('client/{id}/comments', 'CommentController@getCommentsByClient')->where('id','[1-9][0-9]*');
        Route::get('user/{id}/comments', 'CommentController@getCommentsWithDatesByUser')->where('id','[1-9][0-9]*');
        Route::get('user/{id}/clients', 'ClientController@getClientsByUser')->where('id','[1-9][0-9]*');
        Route::resource('client-extra-data', 'ClientExtraDataController')->only(['store']);
        Route::post('assigned-commercial', 'ClientController@assignedCommercial');

        /*Export*/
        Route::post('export', 'ExportController@export');
    });

    Route::resource('quote', 'QuoteController')->only(['create', 'store']);
});