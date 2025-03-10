<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reksadana extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'reksadanas';

    protected $dates = [
        'tanggal_perolehan',
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

    public const TIPE_ASSET_SELECT = [
        'obligasi'     => 'Obligasi',
        'deposito'     => 'Deposito',
        'saham'        => 'Saham',
        'reksadana'    => 'Reksadana',
        'inv_langsung' => 'Investasi Langsung',
        'rdpt'         => 'RDPT',
    ];

    protected $fillable = [
        'asset_migration_id',
        'tipe_asset',
        'program',
        'level_1',
        'level_2',
        'level_3',
        'ticker',
        'name',
        'nama_mi',
        'tanggal_perolehan',
        'nilai_nominal',
        'nilai_perolehan',
        'harga_perolehan',
        'nilai_pasar',
        'type_reksadana',
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
}
