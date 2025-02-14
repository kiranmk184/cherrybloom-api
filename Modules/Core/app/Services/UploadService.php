<?php

namespace Modules\Core\Services;

use Illuminate\Http\UploadedFile;
use Modules\Core\Services\Contracts\UploadServiceContract;
use Modules\Core\DataObjects\File;

class UploadService implements UploadServiceContract
{
    // todo: refactor to use a better and efficient pattern
    public function __construct(private readonly IconUploadService $upload)
    {
    }

    public function upload(UploadedFile $file): File
    {
        return $this->upload->handle(file: $file);
    }
}