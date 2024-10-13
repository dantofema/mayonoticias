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
     * @throws Exception
     */
    private function getData(): array
    {
        $data = match (config('app.env')) {
            'local' => $this->localData(),
            'production' => $this->productionData(),
            default => null,
        };

//        $data = $this->productionData();

        return [
            'companyName' => 'Mayo Noticias',
            'companyLogo' => 'https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600',
            'loginLink' => '#',
            'navLinks' => $this->navLinks(),
            'featuredPosts' => $data['posts'],
            'posts' => $data['posts'],

        ];
    }

    private function localData(): array
    {
        return json_decode(file_get_contents(base_path('tests/fixtures/posts.json')),
            true);
    }

    private function productionData(): array
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
            abort(500, 'Error');
        }

        return $http->json();
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
