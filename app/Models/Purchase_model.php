<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_model extends Model
{
    protected $table="crops";
    protected $fillable=
    [
         "date", "ammount", "id_user", "id_product"
    ];

    public function userr()
    {
        return $this->hasOne(User::class);
    }

    public function prod()
    {
        return $this->hasMany(Product::class);
    }

    
}
