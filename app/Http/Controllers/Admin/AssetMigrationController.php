<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAssetMigrationRequest;
use App\Http\Requests\StoreAssetMigrationRequest;
use App\Http\Requests\UpdateAssetMigrationRequest;
use App\Models\AssetMigration;
use App\Models\YieldCurve;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AssetMigrationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('asset_migration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetMigrations = AssetMigration::with(['yield_curve', 'media'])->get();

        return view('admin.assetMigrations.index', compact('assetMigrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_migration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.assetMigrations.create', compact('yield_curves'));
    }

    public function store(StoreAssetMigrationRequest $request)
    {
        $assetMigration = AssetMigration::create($request->all());

        if ($request->input('file_inv_langsung', false)) {
            $assetMigration->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_inv_langsung'))))->toMediaCollection('file_inv_langsung');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $assetMigration->id]);
        }

        return redirect()->route('admin.asset-migrations.index');
    }

    public function edit(AssetMigration $assetMigration)
    {
        abort_if(Gate::denies('asset_migration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assetMigration->load('yield_curve');

        return view('admin.assetMigrations.edit', compact('assetMigration', 'yield_curves'));
    }

    public function update(UpdateAssetMigrationRequest $request, AssetMigration $assetMigration)
    {
        $assetMigration->update($request->all());

        if ($request->input('file_inv_langsung', false)) {
            if (! $assetMigration->file_inv_langsung || $request->input('file_inv_langsung') !== $assetMigration->file_inv_langsung->file_name) {
                if ($assetMigration->file_inv_langsung) {
                    $assetMigration->file_inv_langsung->delete();
                }
                $assetMigration->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_inv_langsung'))))->toMediaCollection('file_inv_langsung');
            }
        } elseif ($assetMigration->file_inv_langsung) {
            $assetMigration->file_inv_langsung->delete();
        }

        return redirect()->route('admin.asset-migrations.index');
    }

    public function show(AssetMigration $assetMigration)
    {
        abort_if(Gate::denies('asset_migration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetMigration->load('yield_curve');

        return view('admin.assetMigrations.show', compact('assetMigration'));
    }

    public function destroy(AssetMigration $assetMigration)
    {
        abort_if(Gate::denies('asset_migration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetMigration->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetMigrationRequest $request)
    {
        $assetMigrations = AssetMigration::find(request('ids'));

        foreach ($assetMigrations as $assetMigration) {
            $assetMigration->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('asset_migration_create') && Gate::denies('asset_migration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AssetMigration();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
