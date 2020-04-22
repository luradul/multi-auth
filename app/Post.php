<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
