<?php

namespace App\Http\Requests;

use App\Models\Deposito;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepositoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('deposito_create');
    }

    public function rules()
    {
        return [
            'asset_migration_id' => [
                'required',
                'integer',
            ],
            'program' => [
                'required',
            ],
            'level_1' => [
                'string',
                'nullable',
            ],
            'level_2' => [
                'string',
                'nullable',
            ],
            'level_3' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
            'nomor_bilyet' => [
                'string',
                'nullable',
            ],
            'tanggal_perolehan' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tanggal_maturity' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nilai_nominal' => [
                'numeric',
            ],
            'nilai_perolehan' => [
                'numeric',
            ],
            'bunga' => [
                'numeric',
            ],
            'pembagian_bunga' => [
                'string',
                'nullable',
            ],
            'nilai_pasar' => [
                'numeric',
            ],
            'macaulay_duration' => [
                'numeric',
            ],
            'modified_duration' => [
                'numeric',
            ],
            'convexity_apporximation' => [
                'numeric',
            ],
            'bobot_macaulay_duration' => [
                'numeric',
            ],
            'bobot_modified_duration' => [
                'numeric',
            ],
            'bobot_convexity_apporximation' => [
                'numeric',
            ],
            'last_edited_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
