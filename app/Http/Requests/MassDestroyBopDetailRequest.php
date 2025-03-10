<?php

namespace App\Http\Requests;

use App\Models\BopDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBopDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bop_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bop_details,id',
        ];
    }
}
