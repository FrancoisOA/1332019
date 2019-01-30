<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients', function () {
    $data = \Acciona\Models\Client::where('b_cliente', true)->limit(10)->get();
    return response()->json($data, 200);
});
