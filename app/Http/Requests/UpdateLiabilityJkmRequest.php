<?php

namespace App\Http\Requests;

use App\Models\LiabilityJkm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLiabilityJkmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('liability_jkm_edit');
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
            'kps_jumlah_peserta_baru' => [
                'numeric',
                'required',
            ],
            'kps_jumlah_peserta_aktif' => [
                'numeric',
                'required',
            ],
            'iuran' => [
                'numeric',
                'required',
            ],
            'jumlah_kejadian' => [
                'numeric',
                'required',
            ],
            'pembayaran_manfaat' => [
                'numeric',
                'required',
            ],
            'cadangan_teknis' => [
                'numeric',
                'required',
            ],
            'cadangan_teknis_ibnr' => [
                'numeric',
                'required',
            ],
            'kenaikan_cadangan_teknis_ekdp' => [
                'numeric',
                'required',
            ],
            'kenaikan_cadangan_teknis_ibnr' => [
                'numeric',
                'required',
            ],
            'rasio_klaim' => [
                'numeric',
                'required',
            ],
        ];
    }
}
