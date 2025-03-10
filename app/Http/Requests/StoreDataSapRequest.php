<?php

namespace App\Http\Requests;

use App\Models\DataSap;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataSapRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_sap_create');
    }

    public function rules()
    {
        return [
            'report_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
