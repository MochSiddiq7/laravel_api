<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['slug', 'title', 'image', 'description'];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
