<?php

namespace App\Livewire;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;
use Log;

class Home extends Component
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function render(): View
    {
        $data = $this->getData();

        return view('livewire.home', $data)
            ->layout('components.layouts.app', $data);

    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    private function getData(): array
    {

        $credentials = [
            'email' => "demo@dantofema.ar",
            'password' => "demo",
        ];

        $loginUrl = config('services.isofaria.url').'/api/login';

        $login = Http::post($loginUrl, $credentials);

        if ($login->successful()) {
            $token = $login->json()['access_token'];
        } else {
            abort(403, 'Unauthorized');
        }

        $http = Http::withToken($token)
            ->get(config('services.isofaria.url').'/api/v1/home');

        if ($http->failed()) {
            Log::error('Body --> '.$http->body());
            throw new Exception('Failed to get posts');
        }

        return [
            'companyName' => 'Mayo Noticias',
            'companyLogo' => 'https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600',
            'loginLink' => '#',
            'navLinks' => $this->navLinks(),
            'featuredPosts' => $http->json()['posts'],
            'posts' => $http->json()['posts'],

        ];
    }

    private function navLinks(): array
    {
        return [
            [
                'name' => 'Inicio',
                'href' => '#',
                'current' => true, 'slug' => '#',
            ],
            [
                'name' => 'Política',
                'href' => '#',
                'current' => false,
            ],
            [
                'name' => 'Economía',
                'href' => '#',
                'current' => false,
            ],
            [
                'name' => 'Educación',
                'href' => '#',
                'current' => false,
            ],
            [
                'name' => 'Contacto',
                'href' => '#',
                'current' => false,
            ],
        ];
    }
    

}
