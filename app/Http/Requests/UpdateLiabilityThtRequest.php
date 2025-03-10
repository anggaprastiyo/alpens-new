<?php

namespace App\Http\Requests;

use App\Models\LiabilityTht;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLiabilityThtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('liability_tht_edit');
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
            'kps_jumlah_pns_baru' => [
                'numeric',
                'required',
            ],
            'kps_jumlah_peserta_aktif' => [
                'numeric',
                'required',
            ],
            'pensiun_iuran' => [
                'numeric',
                'required',
            ],
            'pensiun_manfaat' => [
                'numeric',
                'required',
            ],
            'tht_iuran_tht' => [
                'numeric',
                'required',
            ],
            'tht_iuran_si' => [
                'numeric',
                'required',
            ],
            'dwiguna_jumlah_klaim_pensiun' => [
                'numeric',
                'required',
            ],
            'dwiguna_jumlah_klaim_meninggal' => [
                'numeric',
                'required',
            ],
            'dwiguna_jumlah_klaim_keluar' => [
                'numeric',
                'required',
            ],
            'dwiguna_jumlah_pembayaran_pensiun' => [
                'numeric',
                'required',
            ],
            'dwiguna_jumlah_pembayaran_meninggal' => [
                'numeric',
                'required',
            ],
            'dwiguna_jumlah_pembayaran_keluar' => [
                'numeric',
                'required',
            ],
            'dwiguna_si_hp_pensiun' => [
                'numeric',
                'required',
            ],
            'dwiguna_si_hp_meninggal' => [
                'numeric',
                'required',
            ],
            'dwiguna_si_hp_keluar' => [
                'numeric',
                'required',
            ],
            'askem_aktif_jumlah_klaim_pensiun' => [
                'numeric',
                'required',
            ],
            'askem_aktif_jumlah_klaim_meninggal' => [
                'numeric',
            ],
            'askem_aktif_jumlah_klaim_keluar' => [
                'numeric',
                'required',
            ],
            'askem_aktif_jumlah_pembayaran_pensiun' => [
                'numeric',
                'required',
            ],
            'askem_aktif_jumlah_pembayaran_meninggal' => [
                'numeric',
                'required',
            ],
            'askem_aktif_jumlah_pembayaran_keluar' => [
                'numeric',
                'required',
            ],
            'askem_pensiun_jumlah_klaim_pensiun' => [
                'numeric',
                'required',
            ],
            'askem_pensiun_jumlah_klaim_meninggal' => [
                'numeric',
                'required',
            ],
            'askem_pensiun_jumlah_klaim_keluar' => [
                'numeric',
                'required',
            ],
            'askem_pensiun_jumlah_pembayaran_pensiun' => [
                'numeric',
                'required',
            ],
            'askem_pensiun_jumlah_pembayaran_meninggal' => [
                'numeric',
                'required',
            ],
            'askem_pensiun_jumlah_pembayaran_keluar' => [
                'numeric',
                'required',
            ],
            'total_manfaat' => [
                'numeric',
                'required',
            ],
            'kmpmd_asuransi_dwiguna' => [
                'numeric',
            ],
            'kmpmd_asuransi_kematian' => [
                'numeric',
                'required',
            ],
            'kenaikan_kmpmd' => [
                'numeric',
                'required',
            ],
            'liabilitas' => [
                'numeric',
                'required',
            ],
        ];
    }
}
