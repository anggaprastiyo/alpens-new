<?php

namespace App\Http\Requests;

use App\Models\YieldCurveDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateYieldCurveDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('yield_curve_detail_edit');
    }

    public function rules()
    {
        return [
            'yield_curve_id' => [
                'required',
                'integer',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tenor_year' => [
                'numeric',
            ],
            'today' => [
                'numeric',
                'required',
            ],
            'change_bps' => [
                'numeric',
                'required',
            ],
            'yesterday_yield' => [
                'numeric',
                'required',
            ],
            'lastweek_yield' => [
                'numeric',
                'required',
            ],
            'lastmonth_yield' => [
                'numeric',
                'required',
            ],
        ];
    }
}
