<?php

namespace App\Livewire;

use Livewire\Component;

class DogCard extends Component
{
    public array $dog;

    public function render()
    {
        return view('livewire.dog-card');
    }
}
