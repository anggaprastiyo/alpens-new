<?php

namespace App\Http\Requests;

use App\Models\Bop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBopRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bop_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
