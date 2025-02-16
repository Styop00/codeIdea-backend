<?php

namespace App\Services;

class FileService
{


    /**
     * @param $file
     * @return string
     */
    public function storeFile($file): string
    {
        $extension = $file->getClientOriginalExtension();
        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
            return $file->store("image", 'public');
        } else {
            return $file->store('document', "public");
        }
    }
}
