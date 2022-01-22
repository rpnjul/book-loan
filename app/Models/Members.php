<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table = 'members';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
