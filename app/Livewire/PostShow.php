<?php

namespace App\Livewire;

use App\Services\NavService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PostShow extends Component
{
    private string $slug;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }


    public function render()
    {
        $apiData = match (config('app.env')) {
            'local' => $this->localData(),
            'production' => $this->productionData(),
            default => null,
        };

        $navService = new NavService();

        $post = json_decode(json_encode($apiData['post']));

        $data = [
            'title' => $post->title,
            'companyName' => $navService->companyName(),
            'companyLogo' => $navService->logoLink(),
            'loginLink' => $navService->loginLink(),
            'navLinks' => $navService->navLinks(),
            'post' => $post,
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
        try {
            $endpoint = config('services.isofaria.url').'/api/v1/posts/'.$this->slug;

            $http = Http::withToken(config('services.isofaria.token'))
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
