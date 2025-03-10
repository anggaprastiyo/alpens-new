<?php

namespace App\Http\Requests;

use App\Models\Saham;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSahamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('saham_edit');
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
            'ticker' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'nilai_perolehan' => [
                'numeric',
            ],
            'harga_perolehan' => [
                'numeric',
            ],
            'harga_pasar' => [
                'numeric',
            ],
            'nilai_pasar' => [
                'numeric',
            ],
            'lembar_saham' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'deviden_saham' => [
                'numeric',
            ],
            'pembagian_deviden_saham' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
