<?php

namespace App\Livewire;

use App\Services\NavService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PostShow extends Component
{
    public string $slug;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }


    /**
     * @throws ConnectionException
     */
    public function render()
    {

        $apiData = $this->getDataFromApi();

        $navService = new NavService();

        $post = json_decode(json_encode($apiData['post']));

        $data = [
            'title' => $post->title,
            'companyName' => $navService->companyName(),
            'companyLogo' => $navService->logoLink(),
            'loginLink' => $navService->loginLink(),
            'navLinks' => $navService->navLinks(),
            'post' => $post,
            'categories' => $apiData['categories'],
        ];

        return view('livewire.post-show', $data)
            ->layout('components.layouts.app', $data);

    }


    private function getDataFromApi(): array
    {
        $endpoint = config('services.isofaria.url').'/api/v1/posts/'.$this->slug;
        $http = Http::withToken(config('services.isofaria.token'))
            ->get($endpoint);

        if ($http->failed()) {
            Log::error('Body --> '.$http->body());
            abort(500, 'Error');
        }

        return $http->json();
    }


}
