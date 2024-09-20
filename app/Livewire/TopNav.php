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

    public function render(): View
    {
        return view('livewire.top-nav');
    }
}
