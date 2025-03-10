<?php

namespace App\Http\Requests;

use App\Models\AssetMigration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetMigrationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_migration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asset_migrations,id',
        ];
    }
}
