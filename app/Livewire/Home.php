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

        $url = config('services.isofaria.url').'/api/v1/home';

        $http = Http::withToken(config('services.isofaria.token'))
            ->get($url);

        if ($http->failed()) {
            Log::error('Body --> ' . $http->body());
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
                'current' => true,'slug'=>'#',
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

    private function posts(): array
    {
        return [
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],

        ];
    }

    private function geaturedPosts(): array
    {
        return [
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,'image' => 1,'slug'=>'#',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'category'=>'Hola','date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John','slug'=>'#',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
        ];
    }

}
