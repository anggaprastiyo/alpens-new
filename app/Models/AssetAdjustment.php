<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetAdjustment extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'asset_adjustments';

    protected $dates = [
        'portfolio_date',
        'tanggal_saldo_awal',
        'tanggal_add_set_modal',
        'tanggal_divestasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'portfolio_date',
        'tipe_asset',
        'program',
        'level_1',
        'level_2',
        'level_3',
        'ticker',
        'name',
        'nama_bank',
        'nomor_bilyet',
        'nama_mi',
        'rating',
        'tanggal_perolehan',
        'tanggal_maturity',
        'nilai_nominal',
        'nilai_perolehan',
        'harga_perolehan',
        'kupon',
        'pembagian_kupon',
        'bunga',
        'pembagian_bunga',
        'harga_pasar',
        'nilai_pasar',
        'nilai_tercatat',
        'potential',
        'lembar_saham',
        'deviden_saham',
        'pembagian_deviden_saham',
        'market_cap_saham',
        'type_reksadana',
        'unit_penyertaan',
        'nab',
        'time_to_maturity',
        'yield_to_maturity',
        'faktor_pengurang',
        'tenor',
        'sisa_tenor',
        'macaulay_duration',
        'modified_duration',
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
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getPortfolioDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPortfolioDateAttribute($value)
    {
        $this->attributes['portfolio_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
