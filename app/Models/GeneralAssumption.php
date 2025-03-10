<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralAssumption extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'general_assumptions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'version_name',
        'tahun_awal_proyeksi',
        'tahun_akhir_proyeksi',
        'pajak_atas_kupon_obligasi',
        'pajak_atas_bunga_deposito',
        'kenaikan_bop_pertahun',
        'spread_yoi_untuk_si',
        'counter_rate',
        'spread_counter_rate',
        'tenor_saham',
        'tenor_reksadana',
        'tenor_inv_langsung',
        'capital_gain_saham',
        'capital_gain_reksadana',
        'capital_gain_inv_langsung',
        'market_cap_saham',
        'capital_gain_rdpt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
