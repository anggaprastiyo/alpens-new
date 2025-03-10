<?php

namespace App\Http\Requests;

use App\Models\LiabilityPortofolio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLiabilityPortofolioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('liability_portofolio_edit');
    }

    public function rules()
    {
        return [
            'biaya_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'modified_duration_tht' => [
                'numeric',
            ],
            'macaulay_duration_tht' => [
                'numeric',
            ],
            'modified_duration_aip' => [
                'numeric',
            ],
            'macaulay_duration_aip' => [
                'numeric',
            ],
            'modified_duration_jkk' => [
                'numeric',
            ],
            'macaulay_duration_jkk' => [
                'numeric',
            ],
            'modified_duration_jkm' => [
                'numeric',
            ],
            'macaulay_duration_jkm' => [
                'numeric',
            ],
        ];
    }
}
