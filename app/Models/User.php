<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $password
 * @property $age
 * @property $membership
 * @property $remember_token
 * @property $email_verified_at
 *
 * @property Lending[] $lendings
 * @property Membership[] $memberships
 * @property Message[] $messages
 * @property Product[] $products
 * @property Purchase[] $purchases
 * @property Sale[] $sales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */






class User extends Authenticatable
{

    static $rules = [
		'name' => 'required',
		'email' => 'required',
        'password' => 'required',
		'age' => 'required',

    ];



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = ['name','email','password','age'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lendings()
    {
        return $this->hasMany('App\Models\Lending', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberships()
    {
        return $this->hasMany('App\Models\Membership', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'id_user', 'id');
    }


}
