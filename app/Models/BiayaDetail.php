<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiayaDetail extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'biaya_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PROGRAM_SELECT = [
        'tht'     => 'THT',
        'pensiun' => 'Pensiun',
        'jkk'     => 'JKK',
        'jkm'     => 'JKM',
    ];

    protected $fillable = [
        'biaya_id',
        'program',
        'iuran',
        'bop',
        'biaya_operasional',
        'rkap_iuran',
        'rkap_bop',
        'rkap_biaya_operasional',
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
}
