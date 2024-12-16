<?php

namespace App\Livewire;

use App\Services\NavService;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class Home extends Component
{

    /**
     * @throws Exception
     */
    public function render(): View
    {
        $apiData = $this->getDataFromApi();

        $navService = new NavService();

        $data = [
            'title' => 'Mayo Noticias',
            'companyName' => $navService->companyName(),
            'companyLogo' => $navService->logoLink(),
            'loginLink' => $navService->loginLink(),
            'navLinks' => $navService->navLinks(),
            'featuredPosts' => array_slice($apiData['posts'], 0, 2),
            'posts' => array_slice($apiData['posts'], 2, 3),
        ];

        /** @noinspection PhpUndefinedMethodInspection */
        return view('livewire.home', $data)
            ->layout('components.layouts.app', $data);

    }

    /**
     * @throws ConnectionException
     */
    private function getDataFromApi(): array
    {
        $credentials = [
            'email' => config('services.isofaria.user'),
            'password' => config('services.isofaria.password'),
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
