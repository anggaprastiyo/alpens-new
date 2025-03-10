<?php

namespace App\Http\Requests;

use App\Models\Rdpt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRdptRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rdpt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rdpts,id',
        ];
    }
}
