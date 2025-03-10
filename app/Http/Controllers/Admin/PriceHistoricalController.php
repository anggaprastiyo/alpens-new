<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPriceHistoricalRequest;
use App\Http\Requests\StorePriceHistoricalRequest;
use App\Http\Requests\UpdatePriceHistoricalRequest;
use App\Models\PriceHistorical;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PriceHistoricalController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('price_historical_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $priceHistoricals = PriceHistorical::all();

        return view('admin.priceHistoricals.index', compact('priceHistoricals'));
    }

    public function create()
    {
        abort_if(Gate::denies('price_historical_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceHistoricals.create');
    }

    public function store(StorePriceHistoricalRequest $request)
    {
        $priceHistorical = PriceHistorical::create($request->all());

        return redirect()->route('admin.price-historicals.index');
    }

    public function edit(PriceHistorical $priceHistorical)
    {
        abort_if(Gate::denies('price_historical_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceHistoricals.edit', compact('priceHistorical'));
    }

    public function update(UpdatePriceHistoricalRequest $request, PriceHistorical $priceHistorical)
    {
        $priceHistorical->update($request->all());

        return redirect()->route('admin.price-historicals.index');
    }

    public function show(PriceHistorical $priceHistorical)
    {
        abort_if(Gate::denies('price_historical_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.priceHistoricals.show', compact('priceHistorical'));
    }

    public function destroy(PriceHistorical $priceHistorical)
    {
        abort_if(Gate::denies('price_historical_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $priceHistorical->delete();

        return back();
    }

    public function massDestroy(MassDestroyPriceHistoricalRequest $request)
    {
        $priceHistoricals = PriceHistorical::find(request('ids'));

        foreach ($priceHistoricals as $priceHistorical) {
            $priceHistorical->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
