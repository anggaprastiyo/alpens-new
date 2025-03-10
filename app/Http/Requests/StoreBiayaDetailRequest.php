<?php

namespace App\Http\Requests;

use App\Models\BiayaDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBiayaDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('biaya_detail_create');
    }

    public function rules()
    {
        return [
            'biaya_id' => [
                'required',
                'integer',
            ],
            'biaya_operasional' => [
                'required',
            ],
            'rkap_iuran' => [
                'required',
            ],
            'rkap_bop' => [
                'required',
            ],
            'rkap_biaya_operasional' => [
                'required',
            ],
        ];
    }
}
