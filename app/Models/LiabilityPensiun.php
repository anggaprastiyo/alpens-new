<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiabilityPensiun extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'liability_pensiuns';

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
        'peserta_pensiun',
        'iuran',
        'spppip',
        'pembayaran_manfaat',
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
