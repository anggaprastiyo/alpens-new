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
use Yajra\DataTables\Facades\DataTables;

class PriceHistoricalController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('price_historical_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PriceHistorical::query()->select(sprintf('%s.*', (new PriceHistorical)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'price_historical_show';
                $editGate      = 'price_historical_edit';
                $deleteGate    = 'price_historical_delete';
                $crudRoutePart = 'price-historicals';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('ticker', function ($row) {
                return $row->ticker ? $row->ticker : '';
            });
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });

            $table->editColumn('isin', function ($row) {
                return $row->isin ? $row->isin : '';
            });
            $table->editColumn('rating', function ($row) {
                return $row->rating ? $row->rating : '';
            });
            $table->editColumn('fair_yield', function ($row) {
                return $row->fair_yield ? $row->fair_yield : '';
            });
            $table->editColumn('fair_price', function ($row) {
                return $row->fair_price ? $row->fair_price : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.priceHistoricals.index');
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
