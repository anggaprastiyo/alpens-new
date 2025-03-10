<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YieldCurveDetail extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'yield_curve_details';

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'yield_curve_id',
        'tanggal',
        'tenor_year',
        'today',
        'change_bps',
        'yesterday_yield',
        'lastweek_yield',
        'lastmonth_yield',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function yield_curve()
    {
        return $this->belongsTo(YieldCurve::class, 'yield_curve_id');
    }

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
