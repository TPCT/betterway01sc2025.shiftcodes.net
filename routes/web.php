<?php

use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Resources\Admin\ClientAgencyResource;
use App\Http\Resources\Admin\ClientResource;
use App\V1\Client\Client;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'Home'])->name('home');
Route::get("/test", function(){
    $client = Client::find(153);
    sendFirebaseNotification($client, null, "hello world", "hello world");
});