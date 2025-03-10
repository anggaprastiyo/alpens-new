<?php

namespace App\Http\Requests;

use App\Models\GeneralAssumption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGeneralAssumptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('general_assumption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:general_assumptions,id',
        ];
    }
}
