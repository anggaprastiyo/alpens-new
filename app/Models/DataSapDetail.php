<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSapDetail extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'data_sap_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'data_sap_id',
        'jenis_program',
        'item',
        'nominal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function data_sap()
    {
        return $this->belongsTo(DataSap::class, 'data_sap_id');
    }
}
