<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surats';

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
