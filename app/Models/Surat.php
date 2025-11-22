<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'NIK';
    public $incrementing = false; protected $keyType = 'string';

    protected $fillable = [
        'NIK',
        'Nama_Lengkap',
        'Jenis_Surat',
        'Keterangan',
        'Tanggal_Pengajuan',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'NIK', 'NIK');
    }
}
