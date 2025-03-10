<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'general_assumption_create',
            ],
            [
                'id'    => 18,
                'title' => 'general_assumption_edit',
            ],
            [
                'id'    => 19,
                'title' => 'general_assumption_show',
            ],
            [
                'id'    => 20,
                'title' => 'general_assumption_delete',
            ],
            [
                'id'    => 21,
                'title' => 'general_assumption_access',
            ],
            [
                'id'    => 22,
                'title' => 'setting_access',
            ],
            [
                'id'    => 23,
                'title' => 'yield_curve_create',
            ],
            [
                'id'    => 24,
                'title' => 'yield_curve_edit',
            ],
            [
                'id'    => 25,
                'title' => 'yield_curve_show',
            ],
            [
                'id'    => 26,
                'title' => 'yield_curve_delete',
            ],
            [
                'id'    => 27,
                'title' => 'yield_curve_access',
            ],
            [
                'id'    => 28,
                'title' => 'yield_curve_detail_create',
            ],
            [
                'id'    => 29,
                'title' => 'yield_curve_detail_edit',
            ],
            [
                'id'    => 30,
                'title' => 'yield_curve_detail_show',
            ],
            [
                'id'    => 31,
                'title' => 'yield_curve_detail_delete',
            ],
            [
                'id'    => 32,
                'title' => 'yield_curve_detail_access',
            ],
            [
                'id'    => 33,
                'title' => 'biaya_create',
            ],
            [
                'id'    => 34,
                'title' => 'biaya_edit',
            ],
            [
                'id'    => 35,
                'title' => 'biaya_show',
            ],
            [
                'id'    => 36,
                'title' => 'biaya_delete',
            ],
            [
                'id'    => 37,
                'title' => 'biaya_access',
            ],
            [
                'id'    => 38,
                'title' => 'biaya_detail_create',
            ],
            [
                'id'    => 39,
                'title' => 'biaya_detail_edit',
            ],
            [
                'id'    => 40,
                'title' => 'biaya_detail_show',
            ],
            [
                'id'    => 41,
                'title' => 'biaya_detail_delete',
            ],
            [
                'id'    => 42,
                'title' => 'biaya_detail_access',
            ],
            [
                'id'    => 43,
                'title' => 'price_historical_create',
            ],
            [
                'id'    => 44,
                'title' => 'price_historical_edit',
            ],
            [
                'id'    => 45,
                'title' => 'price_historical_show',
            ],
            [
                'id'    => 46,
                'title' => 'price_historical_delete',
            ],
            [
                'id'    => 47,
                'title' => 'price_historical_access',
            ],
            [
                'id'    => 48,
                'title' => 'asset_adjustment_create',
            ],
            [
                'id'    => 49,
                'title' => 'asset_adjustment_edit',
            ],
            [
                'id'    => 50,
                'title' => 'asset_adjustment_show',
            ],
            [
                'id'    => 51,
                'title' => 'asset_adjustment_delete',
            ],
            [
                'id'    => 52,
                'title' => 'asset_adjustment_access',
            ],
            [
                'id'    => 53,
                'title' => 'asset_migration_create',
            ],
            [
                'id'    => 54,
                'title' => 'asset_migration_edit',
            ],
            [
                'id'    => 55,
                'title' => 'asset_migration_show',
            ],
            [
                'id'    => 56,
                'title' => 'asset_migration_delete',
            ],
            [
                'id'    => 57,
                'title' => 'asset_migration_access',
            ],
            [
                'id'    => 58,
                'title' => 'bop_create',
            ],
            [
                'id'    => 59,
                'title' => 'bop_edit',
            ],
            [
                'id'    => 60,
                'title' => 'bop_show',
            ],
            [
                'id'    => 61,
                'title' => 'bop_delete',
            ],
            [
                'id'    => 62,
                'title' => 'bop_access',
            ],
            [
                'id'    => 63,
                'title' => 'bop_detail_create',
            ],
            [
                'id'    => 64,
                'title' => 'bop_detail_edit',
            ],
            [
                'id'    => 65,
                'title' => 'bop_detail_show',
            ],
            [
                'id'    => 66,
                'title' => 'bop_detail_delete',
            ],
            [
                'id'    => 67,
                'title' => 'bop_detail_access',
            ],
            [
                'id'    => 68,
                'title' => 'obligasi_create',
            ],
            [
                'id'    => 69,
                'title' => 'obligasi_edit',
            ],
            [
                'id'    => 70,
                'title' => 'obligasi_show',
            ],
            [
                'id'    => 71,
                'title' => 'obligasi_delete',
            ],
            [
                'id'    => 72,
                'title' => 'obligasi_access',
            ],
            [
                'id'    => 73,
                'title' => 'saham_create',
            ],
            [
                'id'    => 74,
                'title' => 'saham_edit',
            ],
            [
                'id'    => 75,
                'title' => 'saham_show',
            ],
            [
                'id'    => 76,
                'title' => 'saham_delete',
            ],
            [
                'id'    => 77,
                'title' => 'saham_access',
            ],
            [
                'id'    => 78,
                'title' => 'deposito_create',
            ],
            [
                'id'    => 79,
                'title' => 'deposito_edit',
            ],
            [
                'id'    => 80,
                'title' => 'deposito_show',
            ],
            [
                'id'    => 81,
                'title' => 'deposito_delete',
            ],
            [
                'id'    => 82,
                'title' => 'deposito_access',
            ],
            [
                'id'    => 83,
                'title' => 'reksadana_create',
            ],
            [
                'id'    => 84,
                'title' => 'reksadana_edit',
            ],
            [
                'id'    => 85,
                'title' => 'reksadana_show',
            ],
            [
                'id'    => 86,
                'title' => 'reksadana_delete',
            ],
            [
                'id'    => 87,
                'title' => 'reksadana_access',
            ],
            [
                'id'    => 88,
                'title' => 'rdpt_create',
            ],
            [
                'id'    => 89,
                'title' => 'rdpt_edit',
            ],
            [
                'id'    => 90,
                'title' => 'rdpt_show',
            ],
            [
                'id'    => 91,
                'title' => 'rdpt_delete',
            ],
            [
                'id'    => 92,
                'title' => 'rdpt_access',
            ],
            [
                'id'    => 93,
                'title' => 'investasi_langsung_create',
            ],
            [
                'id'    => 94,
                'title' => 'investasi_langsung_edit',
            ],
            [
                'id'    => 95,
                'title' => 'investasi_langsung_show',
            ],
            [
                'id'    => 96,
                'title' => 'investasi_langsung_delete',
            ],
            [
                'id'    => 97,
                'title' => 'investasi_langsung_access',
            ],
            [
                'id'    => 98,
                'title' => 'manage_aseet_access',
            ],
            [
                'id'    => 99,
                'title' => 'manage_liability_access',
            ],
            [
                'id'    => 100,
                'title' => 'liability_portofolio_create',
            ],
            [
                'id'    => 101,
                'title' => 'liability_portofolio_edit',
            ],
            [
                'id'    => 102,
                'title' => 'liability_portofolio_show',
            ],
            [
                'id'    => 103,
                'title' => 'liability_portofolio_delete',
            ],
            [
                'id'    => 104,
                'title' => 'liability_portofolio_access',
            ],
            [
                'id'    => 105,
                'title' => 'liability_jkk_create',
            ],
            [
                'id'    => 106,
                'title' => 'liability_jkk_edit',
            ],
            [
                'id'    => 107,
                'title' => 'liability_jkk_show',
            ],
            [
                'id'    => 108,
                'title' => 'liability_jkk_delete',
            ],
            [
                'id'    => 109,
                'title' => 'liability_jkk_access',
            ],
            [
                'id'    => 110,
                'title' => 'liability_jkm_create',
            ],
            [
                'id'    => 111,
                'title' => 'liability_jkm_edit',
            ],
            [
                'id'    => 112,
                'title' => 'liability_jkm_show',
            ],
            [
                'id'    => 113,
                'title' => 'liability_jkm_delete',
            ],
            [
                'id'    => 114,
                'title' => 'liability_jkm_access',
            ],
            [
                'id'    => 115,
                'title' => 'liability_pensiun_create',
            ],
            [
                'id'    => 116,
                'title' => 'liability_pensiun_edit',
            ],
            [
                'id'    => 117,
                'title' => 'liability_pensiun_show',
            ],
            [
                'id'    => 118,
                'title' => 'liability_pensiun_delete',
            ],
            [
                'id'    => 119,
                'title' => 'liability_pensiun_access',
            ],
            [
                'id'    => 120,
                'title' => 'liability_tht_create',
            ],
            [
                'id'    => 121,
                'title' => 'liability_tht_edit',
            ],
            [
                'id'    => 122,
                'title' => 'liability_tht_show',
            ],
            [
                'id'    => 123,
                'title' => 'liability_tht_delete',
            ],
            [
                'id'    => 124,
                'title' => 'liability_tht_access',
            ],
            [
                'id'    => 125,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 126,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 127,
                'title' => 'data_sap_create',
            ],
            [
                'id'    => 128,
                'title' => 'data_sap_edit',
            ],
            [
                'id'    => 129,
                'title' => 'data_sap_show',
            ],
            [
                'id'    => 130,
                'title' => 'data_sap_delete',
            ],
            [
                'id'    => 131,
                'title' => 'data_sap_access',
            ],
            [
                'id'    => 132,
                'title' => 'data_sap_detail_create',
            ],
            [
                'id'    => 133,
                'title' => 'data_sap_detail_edit',
            ],
            [
                'id'    => 134,
                'title' => 'data_sap_detail_show',
            ],
            [
                'id'    => 135,
                'title' => 'data_sap_detail_delete',
            ],
            [
                'id'    => 136,
                'title' => 'data_sap_detail_access',
            ],
            [
                'id'    => 137,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
