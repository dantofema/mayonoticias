<?php

namespace App\Livewire;

use App\Services\NavService;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;
use Log;

class Posts extends Component
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

        $navService = new NavService();

        $data = [
            'title' => 'Mayo Noticias',
            'companyName' => $navService->companyName(),
            'companyLogo' => $navService->logoLink(),
            'loginLink' => $navService->loginLink(),
            'navLinks' => $navService->navLinks(),
            'featuredPosts' => $apiData['posts'],
            'posts' => $apiData['posts'],
        ];

        return view('livewire.posts', $data)
            ->layout('components.layouts.app', $data);

    }

    private function localData(): array
    {
        $json = file_get_contents(base_path('tests/fixtures/posts.json'));
        return (array) json_decode($json);
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

        if (request()->has('categoria')) {
            $http = Http::withToken($token)
                ->get(config('services.isofaria.url').'/api/v1/posts?categoria='.request('categoria'));
        } else {
            $http = Http::withToken($token)
                ->get(config('services.isofaria.url').'/api/v1/posts');
        }

        if ($http->failed()) {
            Log::error('Body --> '.$http->body());
            abort(500, 'Error');
        }

        return $http->json();
    }

}
