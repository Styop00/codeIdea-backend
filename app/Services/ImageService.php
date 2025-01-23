<?php
namespace App\Services;
use GuzzleHttp\Psr7\UploadedFile;

class ImageService{
    /**
     * @param UploadedFile $image
     * @return string
     */
    public function storeImage( $image):string{
        return $image->store('photos','public');
    }
}
