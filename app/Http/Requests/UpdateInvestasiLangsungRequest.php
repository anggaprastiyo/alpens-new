<?php

namespace App\Http\Requests;

use App\Models\InvestasiLangsung;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvestasiLangsungRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('investasi_langsung_edit');
    }

    public function rules()
    {
        return [
            'asset_migration_id' => [
                'required',
                'integer',
            ],
            'program' => [
                'required',
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
            'name' => [
                'string',
                'required',
            ],
            'nilai_pasar' => [
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
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tanggal_add_set_modal' => [
                'date_format:' . config('panel.date_format'),
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
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'harga_perolehan_divestasi' => [
                'numeric',
            ],
            'modified_duration' => [
                'numeric',
            ],
            'macaulay_duration' => [
                'numeric',
            ],
            'last_edited_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
