<?php

namespace App\Repositories;

use App\Models\Ad;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdRepository
{
    public function create(array $data)
    {
        return Ad::create($data);
    }

    public function getAll()
    {
        return Ad::all();
    }

    public function getById($id)
    {
        return Ad::findOrFail($id);
    }

    public function update($id, array $data)
    {
        // Log::info('Updating ad with ID: ' . $id, ['data' => $data]);
        $ad = $this->getById($id);
        $userid = Auth::id();
        if ($ad->user_id != $userid) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $ad->update($data);
        $ad->save();
        // Log::info('Ad updated successfully', ['ad' => $ad]);
        return $ad;
    }

    public function getAllAdsPagination($perPage = 10)
    {
        return Ad::paginate($perPage);
    }

    public function delete($id)
    {
        $ad = $this->getById($id);
        return $ad->delete();
    }
}
