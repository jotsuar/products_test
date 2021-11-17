<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    static $rules = [
		'name' => 'required|min:3|max:50',
		'quantity' => 'required',
		'user_id' => 'required',
		'category_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['name','quantity','user_id','category_id'];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
