<?php

namespace App\Livewire;

use App\Services\NavService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;
use Log;

class PostShow extends Component
{
    private string $slug;

    public function mount(string $slug): void
    {
        $this->slug = $slug;

    }


    public function render(): View
    {
        $apiData = match (config('app.env')) {
            'local' => $this->localData(),
            'production' => $this->productionData(),
            default => null,
        };

        $links = new NavService();

        $data = [
            'title' => $apiData['post']->title,
            'companyName' => 'Mayo Noticias',
            'companyLogo' => 'https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600',
            'loginLink' => $links->loginLink(),
            'navLinks' => $links->navLinks(),
            'post' => (object) $apiData['post'],
        ];

        return view('livewire.post-show', $data)
            ->layout('components.layouts.app', $data);

    }


    private function localData(): array
    {
        $jsonObject = file_get_contents(base_path('tests/fixtures/post.json'));
        return (array) json_decode($jsonObject);
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

        $endpoint = config('services.isofaria.url').'/api/v1/posts/'.$this->slug;

        try {
            $http = Http::withToken($token)
                ->get($endpoint);
            return $http->json();
        } catch (ConnectionException $e) {
            $error = [
                'url' => $endpoint,
                'message' => $e->getMessage(),
            ];
            Log::error(json_encode($error));
            abort(500, 'Error');
        }
    }
}
