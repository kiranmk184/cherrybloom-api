<?php

namespace Modules\Core\DataObjects;

class File
{
    public function __construct(
        public readonly string $name,
        public readonly string $originalName,
        public readonly string $mime,
        public readonly string $path,
        public readonly string $disk,
        public readonly string $hash,
        public readonly null|string $collection = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'originalName' => $this->originalName,
            'mime' => $this->mime,
            'path' => $this->path,
            'disk' => $this->disk,
            'hash' => $this->hash,
            'collection' => $this->collection
        ];
    }
}