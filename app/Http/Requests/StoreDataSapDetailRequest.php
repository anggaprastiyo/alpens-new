<?php

namespace App\Http\Requests;

use App\Models\DataSapDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataSapDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_sap_detail_create');
    }

    public function rules()
    {
        return [
            'data_sap_id' => [
                'required',
                'integer',
            ],
            'jenis_program' => [
                'string',
                'required',
            ],
            'item' => [
                'string',
                'required',
            ],
            'nominal' => [
                'required',
            ],
        ];
    }
}
