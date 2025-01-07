<?php

namespace App\Livewire;

use App\Services\NavService;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;

class Posts extends Component
{

    /**
     * @throws Exception
     */
    public function render(): View
    {
        $apiData = $this->getDataFromApi();

        $navService = new NavService();

        $posts = json_decode(json_encode($apiData['posts']));

        $data = [
            'title' => 'Mayo Noticias',
            'companyName' => $navService->companyName(),
            'companyLogo' => $navService->logoLink(),
            'loginLink' => $navService->loginLink(),
            'navLinks' => $navService->navLinks(),
            'featuredPosts' => $posts,
            'posts' => $posts,
            'categories' => $apiData['categories'],
        ];

        /** @noinspection PhpUndefinedMethodInspection */
        return view('livewire.posts', $data)
            ->layout('components.layouts.app', $data);

    }

    /**
     * @throws ConnectionException
     */
    private function getDataFromApi(): array
    {

        if (request()->has('categoria')) {
            $http = Http::withToken(config('services.isofaria.token'))
                ->get(config('services.isofaria.url').'/api/v1/posts?categoria='.request('categoria'));
        } else {
            $http = Http::withToken(config('services.isofaria.token'))
                ->get(config('services.isofaria.url').'/api/v1/posts');
        }

        if ($http->failed()) {
            Log::error('Body --> '.$http->body());
            abort(500, 'Error');
        }

        return $http->json();
    }


}
