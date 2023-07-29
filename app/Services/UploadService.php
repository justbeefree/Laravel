<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;

class UploadService
{
    public function uploadFile(UploadedFile $file)
    {
        $completedFile = $file->storeAs('news', $file->hashName(), 'public');
        if(!$completedFile){
            throw new \Exception("File wasn't upload");
        }

        return $completedFile;
    }
}
