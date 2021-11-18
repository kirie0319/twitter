<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'post' => 'required | max:120',
    );

    public function users() 
    {
        return $this->belongsToMany(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }
}
