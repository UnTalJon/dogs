<?php

use App\Models\Dog;

beforeEach(function () {
    $this->baseUrl = '/api/v1/dogs';
});

describe('index', function () {
    test('can list dogs with pagination', function () {
        Dog::factory()->count(20)->create();

        $response = $this->getJson($this->baseUrl);

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'age',
                        'size',
                        'description',
                        'photo_url',
                        'created_at',
                        'updated_at',
                    ],
                ],
                'links',
                'meta',
            ])
            ->assertJsonCount(15, 'data');
    });

    test('can list dogs with custom page size', function () {
        Dog::factory()->count(10)->create();

        $response = $this->getJson($this->baseUrl . '?pageSize=5');

        $response->assertOk()
            ->assertJsonCount(5, 'data');
    });

    test('returns empty list when no dogs exist', function () {
        $response = $this->getJson($this->baseUrl);

        $response->assertOk()
            ->assertJsonCount(0, 'data');
    });

    test('can see dog details', function () {
        $dog = Dog::factory()->create();

        $response = $this->getJson("{$this->baseUrl}/{$dog->id}");

        $response->assertOk()
            ->assertJson([
                'data' => [
                    'id' => $dog->id,
                    'name' => $dog->name,
                    'age' => $dog->age,
                    'size' => $dog->size,
                    'description' => $dog->description,
                    'photo_url' => $dog->photo_url,
                ]
            ]);
    });
});

