<?php

namespace App\Http\Requests;

use App\Models\Biaya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBiayaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('biaya_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
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
