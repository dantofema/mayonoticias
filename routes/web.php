<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)
    ->name('home');

Route::get('/nota/{slug}', function () {
    echo 'Hola';
})->name('post.show');

Route::get('/autor/{slug}', function () {
    echo 'Hola';
})->name('author.posts');

Route::get('/categoria/{slug}', function () {
    echo 'Hola';
})->name('category.posts');