<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class CardHeaderHome extends Component
{
    public $post;

    public function mount($post): void
    {
        $this->post = json_decode(json_encode($post));
    }

    public function render(): View
    {
        return view('livewire.card-header-home');
    }
}
