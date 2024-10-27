<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(UsersModel::class); // Убедитесь, что у вас есть модель User
    }
}