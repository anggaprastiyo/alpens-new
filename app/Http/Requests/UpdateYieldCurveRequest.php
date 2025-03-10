<?php

namespace App\Http\Requests;

use App\Models\YieldCurve;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateYieldCurveRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('yield_curve_edit');
    }

    public function rules()
    {
        return [
            'version_name' => [
                'string',
                'required',
            ],
        ];
    }
}
