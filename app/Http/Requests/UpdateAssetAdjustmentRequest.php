<?php

namespace App\Http\Requests;

use App\Models\AssetAdjustment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetAdjustmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_adjustment_edit');
    }

    public function rules()
    {
        return [
            'portfolio_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tipe_asset' => [
                'string',
                'required',
            ],
            'program' => [
                'string',
                'required',
            ],
            'level_1' => [
                'string',
                'required',
            ],
            'level_2' => [
                'string',
                'required',
            ],
            'level_3' => [
                'string',
                'required',
            ],
            'ticker' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'nama_bank' => [
                'string',
                'required',
            ],
            'nomor_bilyet' => [
                'string',
                'required',
            ],
            'nama_mi' => [
                'string',
                'required',
            ],
            'rating' => [
                'string',
                'required',
            ],
            'tanggal_perolehan' => [
                'string',
                'required',
            ],
            'tanggal_maturity' => [
                'string',
                'required',
            ],
            'nilai_nominal' => [
                'numeric',
            ],
            'nilai_perolehan' => [
                'numeric',
                'required',
            ],
            'harga_perolehan' => [
                'numeric',
                'required',
            ],
            'kupon' => [
                'numeric',
                'required',
            ],
            'pembagian_kupon' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bunga' => [
                'numeric',
                'required',
            ],
            'pembagian_bunga' => [
                'string',
                'required',
            ],
            'harga_pasar' => [
                'numeric',
                'required',
            ],
            'nilai_pasar' => [
                'numeric',
                'required',
            ],
            'nilai_tercatat' => [
                'required',
            ],
            'potential' => [
                'numeric',
                'required',
            ],
            'lembar_saham' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'deviden_saham' => [
                'numeric',
                'required',
            ],
            'pembagian_deviden_saham' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'market_cap_saham' => [
                'required',
            ],
            'type_reksadana' => [
                'string',
                'nullable',
            ],
            'unit_penyertaan' => [
                'numeric',
                'required',
            ],
            'nab' => [
                'numeric',
                'required',
            ],
            'time_to_maturity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'yield_to_maturity' => [
                'numeric',
                'required',
            ],
            'faktor_pengurang' => [
                'numeric',
                'required',
            ],
            'tenor' => [
                'numeric',
                'required',
            ],
            'sisa_tenor' => [
                'numeric',
                'required',
            ],
            'macaulay_duration' => [
                'numeric',
                'required',
            ],
            'modified_duration' => [
                'numeric',
                'required',
            ],
            'convexity_apporximation' => [
                'numeric',
                'required',
            ],
            'bobot_macaulay_duration' => [
                'numeric',
                'required',
            ],
            'bobot_modified_duration' => [
                'numeric',
                'required',
            ],
            'bobot_convexity_apporximation' => [
                'numeric',
                'required',
            ],
            'tanggal_saldo_awal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tanggal_add_set_modal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'nilai_investasi' => [
                'numeric',
                'required',
            ],
            'pelunasan_shl' => [
                'numeric',
                'required',
            ],
            'tambahan_setoran_modal' => [
                'numeric',
                'required',
            ],
            'div_yield_bunga' => [
                'numeric',
                'required',
            ],
            'pembagian_div_yield_bunga' => [
                'numeric',
                'required',
            ],
            'projected_add_yield' => [
                'numeric',
                'required',
            ],
            'divestasi' => [
                'numeric',
                'required',
            ],
            'tanggal_divestasi' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'harga_perolehan_divestasi' => [
                'numeric',
                'required',
            ],
        ];
    }
}
