<?php

namespace App\Livewire;

use App\Services\DogService;
use Livewire\Component;

class DogDetail extends Component
{

    protected DogService $dogService;
    public $dog = [];

    public function mount($id, DogService $dogService)
    {
        $this->dogService = $dogService;
        try {

            $this->dog = $this->dogService->getDog($id);
        } catch (\Throwable $th) {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.dog-detail')->layout('components.layouts.application');
    }
}
