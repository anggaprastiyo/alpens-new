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
use Yajra\DataTables\Facades\DataTables;

class AssetAdjustmentController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('asset_adjustment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AssetAdjustment::query()->select(sprintf('%s.*', (new AssetAdjustment)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'asset_adjustment_show';
                $editGate      = 'asset_adjustment_edit';
                $deleteGate    = 'asset_adjustment_delete';
                $crudRoutePart = 'asset-adjustments';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('tipe_asset', function ($row) {
                return $row->tipe_asset ? $row->tipe_asset : '';
            });
            $table->editColumn('program', function ($row) {
                return $row->program ? $row->program : '';
            });
            $table->editColumn('level_1', function ($row) {
                return $row->level_1 ? $row->level_1 : '';
            });
            $table->editColumn('level_2', function ($row) {
                return $row->level_2 ? $row->level_2 : '';
            });
            $table->editColumn('level_3', function ($row) {
                return $row->level_3 ? $row->level_3 : '';
            });
            $table->editColumn('ticker', function ($row) {
                return $row->ticker ? $row->ticker : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.assetAdjustments.index');
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
