<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    // protected $fillable = [
    //     'name',
    //     'description',
    //     'prize',
    //     'image',
    // ];
    protected $fillable = ['name','price','description','image'];


    public function orders(){
    return $this->hasMany(Order::class);
}
}
