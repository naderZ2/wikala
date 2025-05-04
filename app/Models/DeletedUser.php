<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedUser extends Model
{
    use HasFactory;




    protected $table = 'deleted_users';

protected $fillable = [
    'id', 'deleted_at', 'name', 'email', 'bio', 'date_of_birth', 'phone', 'password',
    'image', 'device_id', 'provider_id', 'provider_name', 'lang', 'created_at',
    'updated_at', 'followers_count',
];



}
