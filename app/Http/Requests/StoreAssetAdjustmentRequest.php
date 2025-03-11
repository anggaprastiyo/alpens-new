<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreAssetAdjustmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_adjustment_create');
    }

    public function rules()
    {
        return [
            'portfolio_date' => [
                'date_format:'.config('panel.date_format'),
            ],
            'tipe_asset' => [
                'string',
            ],
            'program' => [
                'string',
            ],
            'level_1' => [
                'string',
            ],
            'level_2' => [
                'string',
            ],
            'level_3' => [
                'string',
            ],
            'ticker' => [
                'string',
            ],
            'name' => [
                'string',
            ],
            'nama_bank' => [
                'string',
            ],
            'nomor_bilyet' => [
                'string',
            ],
            'nama_mi' => [
                'string',
            ],
            'rating' => [
                'string',
            ],
            'tanggal_perolehan' => [
                'string',
            ],
            'tanggal_maturity' => [
                'string',
            ],
            'nilai_nominal' => [
                'numeric',
            ],
            'nilai_perolehan' => [
                'numeric',
            ],
            'harga_perolehan' => [
                'numeric',
            ],
            'kupon' => [
                'numeric',
            ],
            'pembagian_kupon' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bunga' => [
                'numeric',
            ],
            'pembagian_bunga' => [
                'string',
            ],
            'harga_pasar' => [
                'numeric',
            ],
            'nilai_pasar' => [
                'numeric',
            ],
            'potential' => [
                'numeric',
            ],
            'lembar_saham' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'deviden_saham' => [
                'numeric',
            ],
            'pembagian_deviden_saham' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'type_reksadana' => [
                'string',
                'nullable',
            ],
            'unit_penyertaan' => [
                'numeric',
            ],
            'nab' => [
                'numeric',
            ],
            'time_to_maturity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'yield_to_maturity' => [
                'numeric',
            ],
            'faktor_pengurang' => [
                'numeric',
            ],
            'tenor' => [
                'numeric',
            ],
            'sisa_tenor' => [
                'numeric',
            ],
            'macaulay_duration' => [
                'numeric',
            ],
            'modified_duration' => [
                'numeric',
            ],
            'convexity_apporximation' => [
                'numeric',
            ],
            'bobot_macaulay_duration' => [
                'numeric',
            ],
            'bobot_modified_duration' => [
                'numeric',
            ],
            'bobot_convexity_apporximation' => [
                'numeric',
            ],
            'tanggal_saldo_awal' => [
                'date_format:'.config('panel.date_format'),
            ],
            'tanggal_add_set_modal' => [
                'date_format:'.config('panel.date_format'),
            ],
            'nilai_investasi' => [
                'numeric',
            ],
            'pelunasan_shl' => [
                'numeric',
            ],
            'tambahan_setoran_modal' => [
                'numeric',
            ],
            'div_yield_bunga' => [
                'numeric',
            ],
            'pembagian_div_yield_bunga' => [
                'numeric',
            ],
            'projected_add_yield' => [
                'numeric',
            ],
            'divestasi' => [
                'numeric',
            ],
            'tanggal_divestasi' => [
                'date_format:'.config('panel.date_format'),
            ],
            'harga_perolehan_divestasi' => [
                'numeric',
            ],
        ];
    }
}
