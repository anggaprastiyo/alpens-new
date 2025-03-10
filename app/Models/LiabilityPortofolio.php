<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiabilityPortofolio extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'liability_portofolios';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'biaya_id',
        'yield_curve_id',
        'name',
        'description',
        'date',
        'modified_duration_tht',
        'macaulay_duration_tht',
        'modified_duration_aip',
        'macaulay_duration_aip',
        'modified_duration_jkk',
        'macaulay_duration_jkk',
        'modified_duration_jkm',
        'macaulay_duration_jkm',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function biaya()
    {
        return $this->belongsTo(Biaya::class, 'biaya_id');
    }

    public function yield_curve()
    {
        return $this->belongsTo(YieldCurve::class, 'yield_curve_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
