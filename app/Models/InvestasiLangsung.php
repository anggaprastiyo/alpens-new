<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestasiLangsung extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'investasi_langsungs';

    protected $dates = [
        'tanggal_saldo_awal',
        'tanggal_add_set_modal',
        'tanggal_divestasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PROGRAM_SELECT = [
        'AIP'         => 'AIP',
        'JKK'         => 'JKK',
        'JKM'         => 'JKM',
        'KAI'         => 'KAI',
        'KAI_SYARIAH' => 'KAI_SYARIAH',
        'THT'         => 'THT',
    ];

    protected $fillable = [
        'asset_migration_id',
        'program',
        'level_1',
        'level_2',
        'level_3',
        'name',
        'nilai_pasar',
        'market_cap_saham',
        'convexity_apporximation',
        'bobot_macaulay_duration',
        'bobot_modified_duration',
        'bobot_convexity_apporximation',
        'tanggal_saldo_awal',
        'tanggal_add_set_modal',
        'nilai_investasi',
        'pelunasan_shl',
        'tambahan_setoran_modal',
        'div_yield_bunga',
        'pembagian_div_yield_bunga',
        'projected_add_yield',
        'divestasi',
        'tanggal_divestasi',
        'harga_perolehan_divestasi',
        'modified_duration',
        'macaulay_duration',
        'last_edited_by',
        'is_updated',
        'is_new',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function asset_migration()
    {
        return $this->belongsTo(AssetMigration::class, 'asset_migration_id');
    }

    public function getTanggalSaldoAwalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalSaldoAwalAttribute($value)
    {
        $this->attributes['tanggal_saldo_awal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalAddSetModalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAddSetModalAttribute($value)
    {
        $this->attributes['tanggal_add_set_modal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalDivestasiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalDivestasiAttribute($value)
    {
        $this->attributes['tanggal_divestasi'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
