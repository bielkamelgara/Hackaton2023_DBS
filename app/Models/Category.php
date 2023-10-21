<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table= 'categories';
    protected $rules= 
    [
        'name_category'
    ];
    
    protected $fillable= 
    [
        'name_category', 'id_sector',
    ];

    public function sector()
    {
        return $this->hasMany('App\Models\Sector', 'id', 'id_sector');
    }
}
