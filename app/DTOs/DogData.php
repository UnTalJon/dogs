<?php

namespace App\DTOs;

use Illuminate\Contracts\Support\Arrayable;

class DogData implements Arrayable
{

    public function __construct(
        public int     $id,
        public string  $name,
        public int     $age,
        public int     $size,
        public string  $description,
        public ?string $photoUrl = null,
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'size' => $this->size,
            'description' => $this->description,
            'photo_url' => $this->photoUrl,
        ];
    }
}
