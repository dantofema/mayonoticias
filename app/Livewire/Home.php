<?php

namespace App\Livewire;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

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
        $http = Http::post('http://blog.local/api/login', [
            'email' => 'admin@local.com',
            'password' => 'password'
        ]);

        if ($http->failed()) {
            throw new Exception('Failed to login');
        }

        $token = $http->json()['access_token'];

        $http = Http::withToken($token)
            ->get('http://blog.local/api/v1/home');

        if ($http->failed()) {
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
                'current' => true,
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
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],

        ];
    }

    private function geaturedPosts(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'excerpt' => 'Consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'date' => 'Mar 16, 2020',
                'datetime' => '2020-03-16',
                'author' => [
                    'name' => 'Alex John',
                    'avatar' => 'https://randomuser.me/api/port'
                ],
            ],
        ];
    }

}
