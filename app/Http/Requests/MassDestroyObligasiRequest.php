<?php

namespace App\Http\Requests;

use App\Models\Obligasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyObligasiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('obligasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:obligasis,id',
        ];
    }
}
