<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'tb_booking'; // Nama tabel

    // Define the primary key column
    protected $primaryKey = 'id_booking'; // Ensure this matches the column name in your table

    protected $fillable = [
        'tipe_motor',
        'plat_motor',
        'jam_service',
        'paket_service',
        'nama_teknisi',
        'status',
        'user_id',
        'keterangan',
        'produk_id', // Tambahkan ini jika ingin menyimpan produk_id
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
        // 'user_id' = foreign key di tb_booking, 
        // 'id_user' = primary key di tb_user
    }

    // App\Models\Booking
    // app/Models/Booking.php
// Booking.php
public function variants()
    {
        return $this->belongsToMany(Variant::class, 'booking_variant', 'booking_id', 'variant_id');
    }





}
