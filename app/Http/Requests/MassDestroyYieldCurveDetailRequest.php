<?php

namespace App\Http\Requests;

use App\Models\YieldCurveDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyYieldCurveDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('yield_curve_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:yield_curve_details,id',
        ];
    }
}
