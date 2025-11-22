<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Iuran extends Model
{
    protected $table = 'iuran';
    protected $primaryKey = 'ID_Iuran';

    protected $fillable = [
        'NIK',
        'Periode',
        'Nominal',
        'Bukti_Iuran',
        'Tanggal_Bayar',
        'Status_Bayar',
        'Keterangan',
    ];

    /**
     * Relasi: Satu Iuran dimiliki oleh satu Warga (Many-to-One).
     */
    public function warga(): BelongsTo
    {
        // Parameter: Model relasi, Foreign Key di tabel Iuran, Owner Key di tabel Warga
        return $this->belongsTo(Warga::class, 'NIK', 'NIK');
    }
}
