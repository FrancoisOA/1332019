<?php
Route::post('clients/search', 'CliProController@searchClients');
Route::post('ports/search', 'PortController@searchPorts');
Route::post('concepts/search', 'ConceptController@searchConcepts');
Route::get('company/{companyId}/commercials', 'CommercialController@getAllCommercials');
Route::post('users', 'UserController@getAllUsers');