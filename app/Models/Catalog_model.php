<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog_model extends Model
{

    static $rules=
    [
        'name'=> 'required',
    ];
protected $table = "crops";
protected $fillable =
[
    "name", "date", "description", "id_product"
];
    public function produc()
    {
        //e
        return $this->hasMany(Product::class);
    }

}

