<?php

namespace App\Http\Requests;

use App\Models\Biaya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBiayaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('biaya_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
