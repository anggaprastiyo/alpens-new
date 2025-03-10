<?php

namespace App\Http\Requests;

use App\Models\Bop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBopRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bops,id',
        ];
    }
}
