<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admins';

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\Admin','user_id');
    }
}
