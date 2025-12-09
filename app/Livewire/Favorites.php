<?php

namespace App\Livewire;

use App\Services\DogService;
use Livewire\Component;

class Favorites extends Component
{
    public array $dogs = [];
    public array $favoriteIds = [];
    public bool $isLoading = true;

    public function mount()
    {
        $this->isLoading = true;
    }

    public function loadFavorites($ids = [], ?DogService $dogService = null)
    {
        $this->favoriteIds = $ids;
        $this->isLoading = false;

        if (empty($ids)) {
            if (empty($this->dogs)) {
                $this->dogs = [];
            }
            return;
        }

        // Si ya tenemos perros cargados, verificamos qué cambió
        if (!empty($this->dogs)) {
            $currentIds = array_map(function($dog) {
                return $dog['id'] ?? null;
            }, $this->dogs);
            $currentIds = array_filter($currentIds);

            // Verificar si hay nuevos perros para agregar
            $idsToAdd = array_diff($ids, $currentIds);

            if (empty($idsToAdd)) {
                return;
            }

            // Solo cargar los nuevos perros
            if (!$dogService) {
                $dogService = app(DogService::class);
            }

            foreach ($idsToAdd as $id) {
                try {
                    $dog = $dogService->getDog((int)$id);
                    if ($dog) {
                        $this->dogs[] = $dog;
                    }
                } catch (\Throwable $ex) {
                    continue;
                }
            }
            return;
        }

        // Cargar todos los perros desde el servicio (primera carga)
        if (!$dogService) {
            $dogService = app(DogService::class);
        }

        try {
            $newDogs = [];

            foreach ($ids as $id) {
                try {
                    $dog = $dogService->getDog((int)$id);
                    if ($dog) {
                        $newDogs[] = $dog;
                    }
                } catch (\Throwable $ex) {
                    continue;
                }
            }

            $this->dogs = $newDogs;
        } catch (\Throwable $ex) {
            $this->dogs = [];
        }
    }

    public function render()
    {
        return view('livewire.favorites')->layout('components.layouts.application');
    }
}
