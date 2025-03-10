<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetMigration extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'asset_migrations';

    public const TYPE_SELECT = [
        'master'   => 'Master',
        'simulasi' => 'Simulasi',
    ];

    protected $dates = [
        'portofolio_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'yield_curve_id',
        'portofolio_date',
        'jumlah_tahun',
        'name',
        'type',
        'version',
        'compare_laporan_keuangan',
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

    public function getPortofolioDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPortofolioDateAttribute($value)
    {
        $this->attributes['portofolio_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
