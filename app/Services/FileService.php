<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService {
    public function upload($file, $uniqueIdentifyer) {
        $fileName = $file->getClientOriginalName();
        $uniqueFileName = $uniqueIdentifyer . '_' . $fileName;

        if(Storage::disk('public')->exists($uniqueFileName)) return;
        $storedFile = $file->storeAs('media', $uniqueFileName, 'public');

        return $storedFile;
    }
    
    public function delete($filePath) {
        Storage::disk('public')->delete($filePath);
    }

}