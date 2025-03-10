<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiabilityJkk extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'liability_jkks';

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
        'kps_jumlah_peserta_baru',
        'kps_jumlah_peserta_aktif',
        'iuran',
        'jumlah_kejadian',
        'pembayaran_manfaat',
        'cadangan_teknis',
        'cadangan_teknis_ibnr',
        'kenaikan_cadangan_teknis_ekdp',
        'kenaikan_cadangan_teknis_ibnr',
        'rasio_klaim',
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
