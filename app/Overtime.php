<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Overtime extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'date',
        'time_start', 
        'time_end', 
        'status', 
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
