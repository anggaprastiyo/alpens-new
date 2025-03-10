<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAssetAdjustmentRequest;
use App\Http\Requests\StoreAssetAdjustmentRequest;
use App\Http\Requests\UpdateAssetAdjustmentRequest;
use App\Models\AssetAdjustment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetAdjustmentController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('asset_adjustment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetAdjustments = AssetAdjustment::all();

        return view('admin.assetAdjustments.index', compact('assetAdjustments'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_adjustment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetAdjustments.create');
    }

    public function store(StoreAssetAdjustmentRequest $request)
    {
        $assetAdjustment = AssetAdjustment::create($request->all());

        return redirect()->route('admin.asset-adjustments.index');
    }

    public function edit(AssetAdjustment $assetAdjustment)
    {
        abort_if(Gate::denies('asset_adjustment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetAdjustments.edit', compact('assetAdjustment'));
    }

    public function update(UpdateAssetAdjustmentRequest $request, AssetAdjustment $assetAdjustment)
    {
        $assetAdjustment->update($request->all());

        return redirect()->route('admin.asset-adjustments.index');
    }

    public function show(AssetAdjustment $assetAdjustment)
    {
        abort_if(Gate::denies('asset_adjustment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetAdjustments.show', compact('assetAdjustment'));
    }

    public function destroy(AssetAdjustment $assetAdjustment)
    {
        abort_if(Gate::denies('asset_adjustment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetAdjustment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetAdjustmentRequest $request)
    {
        $assetAdjustments = AssetAdjustment::find(request('ids'));

        foreach ($assetAdjustments as $assetAdjustment) {
            $assetAdjustment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
