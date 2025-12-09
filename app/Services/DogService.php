<?php

namespace App\Services;


use App\Mappers\DogMapper;
use App\Models\Dog;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class DogService
{
    /**
     * @throws ConnectionException
     */
    public function getAllDogs(): array
    {
        try {
            $response = Http::get(config('app.url') . '/api/v1/dogs');
        } catch (ConnectionException $e) {
            throw $e;
        }

        if (! $response->successful()) {
            throw new \RuntimeException('Error fetching dogs: ' . $response->body(), $response->status());
        }

        $dogs = $response->json('data');

        return collect($dogs)->all();
    }

    public function getDog(int $id): array {
        try {
            $response = Http::get(config('app.url') . '/api/v1/dogs/' . $id);
        } catch (ConnectionException $e) {
            throw $e;
        }

        if (! $response->successful()) {
            throw new \RuntimeException('Error fetching dog: ' . $response->body(), $response->status());
        }

        $dog = $response->json('data');

        return $dog;
    }
}
