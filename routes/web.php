<?php

use Illuminate\Support\Facades\Route;

Route::get("/", "App\Http\Controllers\Main@home");
Route::get("/account", "App\Http\Controllers\Main@account");
Route::get("/wishlist", "App\Http\Controllers\Main@wishlist");
Route::get("/checkout", "App\Http\Controllers\Main@checkout");
Route::get("/login", "App\Http\Controllers\Main@login");
Route::post("/login", "App\Http\Controllers\Main@login");
Route::get("/register", "App\Http\Controllers\Main@register");
Route::post("/register", "App\Http\Controllers\Main@register");
Route::get("/change-password", "App\Http\Controllers\Main@recovery");
Route::post("/change-password", "App\Http\Controllers\Main@recovery");
Route::post("/actions", "App\Http\Controllers\Main@actions");
Route::get("/help", "App\Http\Controllers\Main@help");
Route::get("/bookings", "App\Http\Controllers\Main@bookings");
Route::get('/password-recovery',

    function(){
        $token = request("token");
        return App::call('App\Http\Controllers\Main@change' , ['token' => $token]);
    },
);
Route::post('/password-recovery',
    function(){
        $token = request("token");
        return App::call('App\Http\Controllers\Main@change' , ['token' => $token]);
    },
);
Route::get('/search',
    function(){
        $query = request("query");
        $date = request("date");
        return App::call('App\Http\Controllers\Main@search' , ['query' => $query, "date" => $date]);
    },
);
Route::get('/tour',
    function(){
        $id = request("id");
        return App::call('App\Http\Controllers\Main@tour' , ['id' => $id]);
    },
);
Route::get('/destination',
    function(){
        $loc = request("loc");
        return App::call('App\Http\Controllers\Main@location' , ['loc' => $loc]);
    },
);
Route::get('/attraction',
    function(){
        $atr = request("atr");
        return App::call('App\Http\Controllers\Main@attraction' , ['atr' => $atr]);
    },
);
Route::Fallback(function () {
    return App::call('App\Http\Controllers\Main@error');
});