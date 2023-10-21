<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
 * @property $id
 * @property $ccn
 * @property $date
 * @property $password
 * @property $created_at
 * @property $updated_at
 *
 * @property Membership[] $memberships
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Payment extends Model
{
    
    static $rules = [
		'ccn' => 'required',
		'date' => 'required',
    'password' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table="payments";
    protected $fillable = ['ccn','date','password',];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberships()
    {
        return $this->hasMany('App\Models\Membership', 'id_pay', 'id');
    }
    

}
