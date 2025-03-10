<?php

namespace App\Http\Requests;

use App\Models\Reksadana;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReksadanaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reksadana_create');
    }

    public function rules()
    {
        return [
            'asset_migration_id' => [
                'required',
                'integer',
            ],
            'tipe_asset' => [
                'required',
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
            'ticker' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'nama_mi' => [
                'string',
                'nullable',
            ],
            'tanggal_perolehan' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nilai_nominal' => [
                'numeric',
            ],
            'nilai_perolehan' => [
                'numeric',
            ],
            'harga_perolehan' => [
                'numeric',
            ],
            'nilai_pasar' => [
                'numeric',
            ],
            'type_reksadana' => [
                'string',
                'nullable',
            ],
            'unit_penyertaan' => [
                'numeric',
            ],
            'nab' => [
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
