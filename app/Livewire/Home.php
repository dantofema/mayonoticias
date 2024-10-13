<?php

namespace App\Livewire;

use App\Services\NavLinks;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;
use Log;

class Home extends Component
{

    /**
     * @throws Exception
     */
    public function render(): View
    {
        $apiData = match (config('app.env')) {
            'local' => $this->localData(),
            'production' => $this->productionData(),
            default => null,
        };

        $links = new NavLinks();

        $data = [
            'title' => 'Mayo Noticias',
            'companyName' => 'Mayo Noticias',
            'companyLogo' => 'https://dantofema.ar/images/marca-dantofema-1.png',
            'loginLink' => $links->loginLink(),
            'navLinks' => $links->navLinks(),
            'featuredPosts' => $apiData['posts'],
            'posts' => $apiData['posts'],
        ];

        return view('livewire.home', $data)
            ->layout('components.layouts.app', $data);

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

}
