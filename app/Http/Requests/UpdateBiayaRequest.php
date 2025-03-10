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
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'name' => [
                'string',
                'required',
            ],
            'source_file' => [
                'required',
            ],
        ];
    }
}
