<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiabilityTht extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'liability_thts';

    protected $dates = [
        'report_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'liability_portofolio_id',
        'report_date',
        'skenario',
        'tahun',
        'kps_jumlah_pns_baru',
        'kps_jumlah_peserta_aktif',
        'pensiun_iuran',
        'pensiun_manfaat',
        'tht_iuran_tht',
        'tht_iuran_si',
        'dwiguna_jumlah_klaim_pensiun',
        'dwiguna_jumlah_klaim_meninggal',
        'dwiguna_jumlah_klaim_keluar',
        'dwiguna_jumlah_pembayaran_pensiun',
        'dwiguna_jumlah_pembayaran_meninggal',
        'dwiguna_jumlah_pembayaran_keluar',
        'dwiguna_si_hp_pensiun',
        'dwiguna_si_hp_meninggal',
        'dwiguna_si_hp_keluar',
        'askem_aktif_jumlah_klaim_pensiun',
        'askem_aktif_jumlah_klaim_meninggal',
        'askem_aktif_jumlah_klaim_keluar',
        'askem_aktif_jumlah_pembayaran_pensiun',
        'askem_aktif_jumlah_pembayaran_meninggal',
        'askem_aktif_jumlah_pembayaran_keluar',
        'askem_pensiun_jumlah_klaim_pensiun',
        'askem_pensiun_jumlah_klaim_meninggal',
        'askem_pensiun_jumlah_klaim_keluar',
        'askem_pensiun_jumlah_pembayaran_pensiun',
        'askem_pensiun_jumlah_pembayaran_meninggal',
        'askem_pensiun_jumlah_pembayaran_keluar',
        'total_manfaat',
        'kmpmd_asuransi_dwiguna',
        'kmpmd_asuransi_kematian',
        'kenaikan_kmpmd',
        'liabilitas',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function liability_portofolio()
    {
        return $this->belongsTo(LiabilityPortofolio::class, 'liability_portofolio_id');
    }

    public function getReportDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReportDateAttribute($value)
    {
        $this->attributes['report_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
