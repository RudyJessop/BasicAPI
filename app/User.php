<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * Table used by the Model
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * Declaring date attributes
     * @var [type]
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Returns Valued username
     * @param  [type] $query [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function scopeUsername($query, $value){
        return $query->where('username', $value)->first();
    }

    /**
     * Returns Valued Email
     * @param  [type] $query [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function scopeEmail($query, $value){
        return $query->where('email', $value)->first();
    }
}
