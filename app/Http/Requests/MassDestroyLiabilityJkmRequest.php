<?php

namespace App\Http\Requests;

use App\Models\LiabilityJkm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLiabilityJkmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('liability_jkm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:liability_jkms,id',
        ];
    }
}
