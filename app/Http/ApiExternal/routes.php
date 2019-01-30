<?php
Route::group(['prefix' => 'sunat'], function (){
    Route::get('consulta-ruc/{number_document}', 'SunatController@search')
        ->where('number_document','[1-9][0-9]*')
        ->name('search-client-data-sunat');
});