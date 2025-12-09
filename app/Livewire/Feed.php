<?php

namespace App\Livewire;

use App\Services\DogService;
use Livewire\Component;

class Feed extends Component
{
    protected DogService $dogService;
    public $dogs = [];

    public function mount(DogService $dogService)
    {
        $this->dogService = $dogService;

        try {
            $this->dogs = $this->dogService->getAllDogs();

        } catch (\Throwable $ex) {
            abort(500, 'Unable to fetch dogs at this time.');
        }
    }
    public function render()
    {
        return view('livewire.feed')->layout('components.layouts.application');
    }
}
