<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const NAM = 0;
    const NU = 1;
    const MANAGER = 1;
    const EMPLOYEE = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'birthday',
        'avatar',
        'sex',
        'day_in',
        'salary_day',
        'phone'
    ];

    protected $dates = [
        'deleted_at',
        'birthday',
        'day_in'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function works() {
        return $this->hasMany(Working::class);
    }

    public function vacations() {
        return $this->hasMany(Vacation::class);
    }

    public function overTimes() {
        return $this->hasMany(Overtime::class);
    }

    public function salaries() {
        return $this->hasMany(Salary::class);
    }
}

