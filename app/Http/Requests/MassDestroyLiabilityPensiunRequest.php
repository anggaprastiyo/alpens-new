<?php

namespace App\Http\Requests;

use App\Models\LiabilityPensiun;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLiabilityPensiunRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('liability_pensiun_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:liability_pensiuns,id',
        ];
    }
}
