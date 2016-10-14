<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $table = 'post';



    /**
     * Get the phone record associated with the user.
     */
    public function body()
    {
        return $this->hasOne('App\PostBody','postId');
    }
}