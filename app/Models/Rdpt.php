<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rdpt extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'rdpts';

    protected $dates = [
        'tanggal_perolehan',
        'tanggal_maturity',
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
        'tanggal_perolehan',
        'tanggal_maturity',
        'nilai_nominal',
        'nilai_perolehan',
        'harga_perolehan',
        'kupon',
        'pembagian_kupon',
        'nilai_pasar',
        'unit_penyertaan',
        'nab',
        'macaulay_duration',
        'modified_duration',
        'convexity_apporximation',
        'bobot_macaulay_duration',
        'bobot_modified_duration',
        'bobot_convexity_apporximation',
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

    public function getTanggalPerolehanAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalPerolehanAttribute($value)
    {
        $this->attributes['tanggal_perolehan'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalMaturityAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalMaturityAttribute($value)
    {
        $this->attributes['tanggal_maturity'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
