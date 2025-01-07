<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class TopNav extends Component
{
    public array $navLinks = [];
    public string $companyName = '';
    public string $companyLogo = '';
    public string $loginLink = '';
    public array $categories = [];

    public function render(): View
    {
        $this->getCategories();
        return view('livewire.top-nav');
    }

    public function getCategories(): void
    {
        foreach ($this->categories as $key => $category) {
            $this->categories[$key]['href'] = route('posts',
                ['categoria' => $category['slug']]);
        }
    }
}
