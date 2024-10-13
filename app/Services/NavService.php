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
//            [
//                'name' => 'Contacto',
//                'href' => route('contact'),
//                'current' => false,
//            ],
        ];
    }

    public function loginLink(): string
    {
        return 'https://isofaria-demo.dantofema.ar/login';
    }

    public function logoLink(): string
    {
        return 'https://dantofema.ar/images/marca-dantofema-1.png';
    }

    public function companyName(): string
    {
        return 'Mayo Noticias';
    }
}