<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variants'; // pastikan sesuai nama tabel di database kamu

    protected $primaryKey = 'id'; // defaultnya 'id', ubah jika kamu pakai primary key lain

    protected $fillable = [
        'product_id',  // gunakan product_id, bukan product_slug
        'name',
        'description',
        'image',
        'price',
        'stock',
    ];

    // app/Models/Variant.php
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // App\Models\Variant
    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_variant', 'variant_id', 'booking_id');
    }


}
