<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warga extends Model
{
    protected $table = 'warga'; // Nama tabel di database
    protected $primaryKey = 'NIK'; // Definisikan NIK sebagai Primary Key
    public $incrementing = false; // Karena NIK bukan auto-increment
    protected $keyType = 'string'; // Tipe data Primary Key (NIK)

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'NIK',
        'Nama',
        'Tanggal_Lahir',
        'Alamat',
        'RT',
        'Status_Tinggal',
        'Nomor_HP',
    ];

    /**
     * Relasi: Satu Warga memiliki banyak Iuran (One-to-Many).
     */
    public function iuran(): HasMany
    {
        // Parameter: Model relasi, Foreign Key di tabel Iuran, Local Key di tabel Warga
        return $this->hasMany(Iuran::class, 'NIK', 'NIK');
    }
}
