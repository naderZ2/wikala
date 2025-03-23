<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    protected function uploadFile ($file, $location ,$imagePath = null) {
        if($imagePath)
        {
            $img =public_path($imagePath);
            File::delete($img);
        }
        $file_original_name = $file ->getClientOriginalName();
        $file_original_extension = $file -> getClientOriginalExtension();
        $file_unique_name = time().rand(100,999).'.'.$file_original_extension;
        $new_path = 'uploads/'.$location;
        $folder_path = public_path($new_path);
        $file -> move($folder_path, $file_unique_name);
        return $new_path.'/'.$file_unique_name;
    }
    
     protected function copyFile($imagePath, $newFileName)
    {
        // Ensure the image path exists
        $original_path = public_path($imagePath);
        if (!File::exists($original_path)) {
            return false; // Or throw an exception
        }

        // Extract the directory from the original path
        $directory = dirname($imagePath);
        $extension = pathinfo($imagePath, PATHINFO_EXTENSION);

        // Prepare new file path
        $new_path = 'uploads/' . $directory;
        $folder_path = public_path($new_path);
        $new_file_path = $folder_path . '/' . $newFileName . '.' . $extension;

        // Copy the file
        File::ensureDirectoryExists($folder_path);
        File::copy($original_path, $new_file_path);

        return $new_path . '/' . $newFileName . '.' . $extension;
    }

}
