<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;

class Salary extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
