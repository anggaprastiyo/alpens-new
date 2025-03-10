<?php

namespace App\Http\Requests;

use App\Models\PriceHistorical;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePriceHistoricalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_historical_edit');
    }

    public function rules()
    {
        return [
            'ticker' => [
                'string',
                'required',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'isin' => [
                'string',
                'required',
            ],
            'rating' => [
                'string',
                'required',
            ],
            'fair_yield' => [
                'numeric',
                'required',
            ],
            'fair_price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
