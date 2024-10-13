<?php

use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Posts;
use App\Livewire\PostShow;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)
    ->name('home');

Route::get('/nota/{slug}', PostShow::class)
    ->name('post.show');

Route::get('/notas', Posts::class)
    ->name('posts');

Route::get('/contacto', Contact::class)
    ->name('contact');