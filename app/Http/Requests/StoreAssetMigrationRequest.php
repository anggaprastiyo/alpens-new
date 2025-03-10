<?php

namespace App\Http\Requests;

use App\Models\AssetMigration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetMigrationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_migration_create');
    }

    public function rules()
    {
        return [
            'yield_curve_id' => [
                'required',
                'integer',
            ],
            'portofolio_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jumlah_tahun' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'name' => [
                'string',
                'required',
            ],
            'version' => [
                'string',
                'required',
            ],
        ];
    }
}
