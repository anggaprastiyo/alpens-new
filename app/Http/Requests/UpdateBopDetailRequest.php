<?php

namespace App\Http\Requests;

use App\Models\BopDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBopDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bop_detail_edit');
    }

    public function rules()
    {
        return [
            'bop_id' => [
                'required',
                'integer',
            ],
            'tahun' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
