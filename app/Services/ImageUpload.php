<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ImageUpload
{
    public function upload(UploadedFile  $file, string $filePath): string
    {
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path($filePath), $fileName);

        return "{$filePath}/{$fileName}";
    }

    public function update(UploadedFile  $file, string $filePath, string $previousUploadedFilePath): string
    {
        // delete the previous file
        $this->delete($previousUploadedFilePath);

        // upload the new file
        return $this->upload($file, $filePath);
    }

    public function delete(string $toBeDeletedFilePath): void
    {
        if (File::exists($toBeDeletedFilePath)) {
            File::delete($toBeDeletedFilePath);
        }
    }
}
