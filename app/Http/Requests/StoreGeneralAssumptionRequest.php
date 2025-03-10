<?php

namespace App\Http\Requests;

use App\Models\GeneralAssumption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGeneralAssumptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('general_assumption_create');
    }

    public function rules()
    {
        return [
            'version_name' => [
                'string',
                'required',
            ],
            'tahun_awal_proyeksi' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tahun_akhir_proyeksi' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pajak_atas_kupon_obligasi' => [
                'numeric',
                'required',
            ],
            'pajak_atas_bunga_deposito' => [
                'numeric',
                'required',
            ],
            'kenaikan_bop_pertahun' => [
                'numeric',
                'required',
            ],
            'spread_yoi_untuk_si' => [
                'numeric',
                'required',
            ],
            'counter_rate' => [
                'numeric',
                'required',
            ],
            'spread_counter_rate' => [
                'numeric',
                'required',
            ],
            'tenor_saham' => [
                'numeric',
                'required',
            ],
            'tenor_reksadana' => [
                'numeric',
                'required',
            ],
            'tenor_inv_langsung' => [
                'numeric',
                'required',
            ],
            'capital_gain_saham' => [
                'numeric',
                'required',
            ],
            'capital_gain_reksadana' => [
                'numeric',
                'required',
            ],
            'capital_gain_inv_langsung' => [
                'numeric',
                'required',
            ],
            'market_cap_saham' => [
                'numeric',
                'required',
            ],
            'capital_gain_rdpt' => [
                'numeric',
                'required',
            ],
        ];
    }
}
