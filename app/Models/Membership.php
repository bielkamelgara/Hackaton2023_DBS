<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Membership
 *
 * @property $id
 * @property $payment
 * @property $ccn
 * @property $duration
 * @property $password
 * @property $id_pay
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 *
 * @property Payment $payment
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Membership extends Model
{
    
    static $rules = [
		'payment' => 'required',
		'ccn' => 'required',
		'duration' => 'required',
        'password'=>'required',
		'id_pay' => 'required',
		'id_user' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['payment','ccn','duration','id_pay','id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'id', 'id_pay');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
