<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

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
                'date_format:'.config('panel.date_format'),
                'nullable',
            ],
            'tipe_asset' => [
                'string',
                'nullable',
            ],
            'program' => [
                'string',
                'nullable',
            ],
            'level_1' => [
                'string',
                'nullable',
            ],
            'level_2' => [
                'string',
                'nullable',
            ],
            'level_3' => [
                'string',
                'nullable',
            ],
            'ticker' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'nama_bank' => [
                'string',
                'nullable',
            ],
            'nomor_bilyet' => [
                'string',
                'nullable',
            ],
            'nama_mi' => [
                'string',
                'nullable',
            ],
            'rating' => [
                'string',
                'nullable',
            ],
            'tanggal_perolehan' => [
                'string',
                'nullable',
            ],
            'tanggal_maturity' => [
                'string',
                'nullable',
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
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bunga' => [
                'numeric',
            ],
            'pembagian_bunga' => [
                'string',
                'nullable',
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
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'deviden_saham' => [
                'numeric',
            ],
            'pembagian_deviden_saham' => [
                'nullable',
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
                'nullable',
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
                'nullable',
            ],
            'tanggal_add_set_modal' => [
                'date_format:'.config('panel.date_format'),
                'nullable',
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
                'nullable',
            ],
            'harga_perolehan_divestasi' => [
                'numeric',
            ],
        ];
    }
}
