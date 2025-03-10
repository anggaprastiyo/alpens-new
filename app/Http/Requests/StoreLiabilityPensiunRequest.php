<?php

namespace App\Http\Requests;

use App\Models\LiabilityPensiun;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLiabilityPensiunRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('liability_pensiun_create');
    }

    public function rules()
    {
        return [
            'liability_portofolio_id' => [
                'required',
                'integer',
            ],
            'report_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'skenario' => [
                'string',
                'required',
            ],
            'tahun' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'peserta_pensiun' => [
                'numeric',
                'required',
            ],
            'iuran' => [
                'numeric',
                'required',
            ],
            'spppip' => [
                'numeric',
                'required',
            ],
            'pembayaran_manfaat' => [
                'numeric',
                'required',
            ],
        ];
    }
}
