<?php

namespace App\Http\Requests;

use App\Models\Obligasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateObligasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('obligasi_edit');
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
            'rating' => [
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
            'harga_perolehan' => [
                'numeric',
            ],
            'kupon' => [
                'numeric',
            ],
            'pembagian_kupon' => [
                'numeric',
            ],
            'harga_pasar' => [
                'numeric',
            ],
            'nilai_pasar' => [
                'numeric',
            ],
            'yield_to_maturity' => [
                'numeric',
            ],
            'faktor_pengurang' => [
                'numeric',
            ],
            'tenor' => [
                'numeric',
            ],
            'sisa_tenor' => [
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
