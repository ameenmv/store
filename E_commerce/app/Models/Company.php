<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = ['name','email','phone','address','logo'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
