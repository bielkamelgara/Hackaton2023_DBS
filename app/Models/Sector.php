<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sector
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $category
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sector extends Model
{
    protected $table= 'sectors';
    static $rules = [

		'name' => 'required',
        'description'=> 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = ['name','description','category'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'id_sector', 'id');
    }


}
