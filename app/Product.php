<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
	protected $fillable = [
	    'name',
	    'price',
	    'describe',
    ];
    protected $guarded = ['id'];

    public function categories() {
    	return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function images() {
    	return $this->hasMany(Image::class);
    }
}
