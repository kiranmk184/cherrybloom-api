<?php

namespace Modules\Core\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Core\DataObjects\File;

class IconUploadService
{
    public function handle(UploadedFile $file): File
    {
        $name = $file->hashName();
        $upload = Storage::disk('public')->put("icons", $file);

        return new File(
            name: "{$name}",
            originalName: $file->getClientOriginalName(),
            mime: $file->getClientMimeType(),
            path: Storage::url("{$name}"),
            // todo: extract to configs
            disk: "public",
            hash: hash_file(
                // todo: extract to configs
                'md5',
                Storage::disk('public')->url("icons/{$name}")
            ),
            collection: 'uploads'
        );
    }
}