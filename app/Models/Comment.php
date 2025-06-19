<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = ['comment', 'numberOfVotes'];
    public $table = 'comments';

    // Add the post relation
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
