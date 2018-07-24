<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Working extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at']; 

    public function user() {
        return $this->belongsTo(User::class);
    }
}
