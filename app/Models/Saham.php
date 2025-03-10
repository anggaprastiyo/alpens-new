<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saham extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'sahams';

    protected $dates = [
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
        'ticker',
        'name',
        'nilai_perolehan',
        'harga_perolehan',
        'harga_pasar',
        'nilai_pasar',
        'lembar_saham',
        'deviden_saham',
        'pembagian_deviden_saham',
        'market_cap_saham',
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
}
