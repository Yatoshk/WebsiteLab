<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;

    protected $table = 'comments_models';

    protected $fillable = ['user_id', 'post_id', 'body'];

    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(PostsModel::class, 'post_id');
    }
}