<?php

namespace App\Http\Requests;

use App\Models\YieldCurve;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreYieldCurveRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('yield_curve_create');
    }

    public function rules()
    {
        return [
            'version_name' => [
                'string',
                'required',
            ],
            'source_file' => [
                'required',
            ],
        ];
    }
}
