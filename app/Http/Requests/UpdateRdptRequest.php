<?php

namespace App\Http\Requests;

use App\Models\Rdpt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRdptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rdpt_edit');
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
            'harga_perolehan' => [
                'numeric',
            ],
            'kupon' => [
                'numeric',
            ],
            'pembagian_kupon' => [
                'numeric',
            ],
            'nilai_pasar' => [
                'numeric',
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
