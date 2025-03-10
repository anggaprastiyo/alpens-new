<?php

namespace App\Http\Requests;

use App\Models\PriceHistorical;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPriceHistoricalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('price_historical_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:price_historicals,id',
        ];
    }
}
