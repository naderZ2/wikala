<?php

namespace App\Services;

use App\Models\SpecialRequest;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\SpecialRequestDetails;
// use App\Services\SpecialRequestService;

class SpecialRequestService
{

    use ResponsesTrait;
    use FileUploadTrait;
    // Define your service methods here

    public function createSpecialRequest($data)
    {
        // Logic to create a special request
    $specialRequest = SpecialRequest::create([
            'category_id' => $data['category_id'],
            'family_name' => $data['family_name'],
            'area_id' => $data['area_id'],
            'budget' => $data['budget'],
            'date' => $data['date'],
            'time' => $data['time'],
            'description' => $data['description'],
        ]);
        // Log::info($specialRequest);
        // $specialRequest = $this->createSpecialRequestDetails($data,$specialRequest->id);

        return $specialRequest;
        
    }

    public function createSpecialRequestDetails($data ,$role = 'client')
    {
        Log::info($role);
        Log::info($data);
        if ($data['type'] === 'file') {
            // Handle file upload

            if ($data['content'] instanceof \Illuminate\Http\UploadedFile) {
                $file = $data['content'];

                // Store the file in the 'public/SpecialRequestFiles' directory
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); ;
                // Move the file to the destination directory
                $file->move(public_path('SpecialRequestFiles'), $fileName);
                // Save the file name in the 'content' field
                $filePath= 'SpecialRequestFiles/'. $fileName;
                $type= 'file';
                $content = $filePath;
            } else {
                return response()->json(['error' => 'File is required when type is set to "file".'], 422);
            }
        } elseif ($data['type'] === 'text') {
            // Ensure content is text
            if (isset($data['content']) && is_string($data['content'])) {
                $type= 'text';
                $content =$data['content'] ;
            } else {
                return response()->json(['error' => 'Text content is required when type is set to "text".'], 422);
            }
        }


    $specialRequestDetails = SpecialRequestDetails::create([
            'special_requests_id' => $data['special_requests_id'],
            'user_id' => Auth::id(),
            'type' => $type,
            'role' => $role,
            'content' => $content,
        ]);
        


        return $specialRequestDetails;
    }

}
