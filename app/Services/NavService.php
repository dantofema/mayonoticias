<?php

namespace App\Services;

class NavService
{

    public function navLinks(): array
    {
        return [
            [
                'name' => 'Inicio',
                'href' => route('home'),
                'current' => true, 'slug' => '#',
            ],
            [
                'name' => 'Política',
                'href' => route('posts', ['categoria' => 'politica']),
                'current' => false,
            ],
            [
                'name' => 'Economía',
                'href' => route('posts', ['categoria' => 'economia']),
                'current' => false,
            ],
            [
                'name' => 'Educación',
                'href' => route('posts', ['categoria' => 'educacion']),

                'current' => false,
            ],

        ];
    }

    public function loginLink(): string
    {
        return 'https://isofaria.dantofema.ar/admin/login';
    }

    public function logoLink(): string
    {
        return asset('img/mayo-logo.jpg');
    }

    public function companyName(): string
    {
        return 'Mayo Noticias';
    }
}