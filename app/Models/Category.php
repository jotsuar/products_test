<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['name','id'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
    

}
