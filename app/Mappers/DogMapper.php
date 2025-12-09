<?php

namespace App\Mappers;

use App\DTOs\DogData;

class DogMapper
{
    /**
     * Map JSON data to DogData DTO
     *
     * @param array|string $json
     * @return DogData
     * @throws \InvalidArgumentException
     */
    public static function fromJson(array|string $json): DogData
    {
        $data = is_string($json) ? json_decode($json, true) : $json;

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Invalid JSON data provided');
        }

        return self::fromArray($data);
    }

    /**
     * Map array data to DogData DTO
     *
     * @param array $data
     * @return DogData
     * @throws \InvalidArgumentException
     */
    public static function fromArray(array $data): DogData
    {
        if (!isset($data['id']) ||!isset($data['name']) || !isset($data['age']) || !isset($data['size']) || !isset($data['description'])) {
            throw new \InvalidArgumentException('Missing required fields: id, name, age, size, description');
        }

        return new DogData(
            id: $data['id'],
            name: $data['name'],
            age: (int) $data['age'],
            size: (int) $data['size'],
            description: $data['description'],
            photoUrl: $data['photo_url'] ?? $data['photoUrl'] ?? null,
        );
    }

    /**
     * Map multiple JSON objects to array of DogData DTOs
     *
     * @param array|string $json
     * @return array<DogData>
     * @throws \InvalidArgumentException
     */
    public static function fromJsonCollection(array|string $json): array
    {
        $data = is_string($json) ? json_decode($json, true) : $json;

        if (!is_array($data)) {
            throw new \InvalidArgumentException('Invalid JSON data provided');
        }

        return array_map(fn($item) => self::fromArray($item), $data);
    }
}
