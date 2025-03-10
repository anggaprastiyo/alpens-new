<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGeneralAssumptionRequest;
use App\Http\Requests\StoreGeneralAssumptionRequest;
use App\Http\Requests\UpdateGeneralAssumptionRequest;
use App\Models\GeneralAssumption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GeneralAssumptionController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('general_assumption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalAssumptions = GeneralAssumption::all();

        return view('admin.generalAssumptions.index', compact('generalAssumptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('general_assumption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalAssumptions.create');
    }

    public function store(StoreGeneralAssumptionRequest $request)
    {
        $generalAssumption = GeneralAssumption::create($request->all());

        return redirect()->route('admin.general-assumptions.index');
    }

    public function edit(GeneralAssumption $generalAssumption)
    {
        abort_if(Gate::denies('general_assumption_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalAssumptions.edit', compact('generalAssumption'));
    }

    public function update(UpdateGeneralAssumptionRequest $request, GeneralAssumption $generalAssumption)
    {
        $generalAssumption->update($request->all());

        return redirect()->route('admin.general-assumptions.index');
    }

    public function show(GeneralAssumption $generalAssumption)
    {
        abort_if(Gate::denies('general_assumption_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalAssumptions.show', compact('generalAssumption'));
    }

    public function destroy(GeneralAssumption $generalAssumption)
    {
        abort_if(Gate::denies('general_assumption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalAssumption->delete();

        return back();
    }

    public function massDestroy(MassDestroyGeneralAssumptionRequest $request)
    {
        $generalAssumptions = GeneralAssumption::find(request('ids'));

        foreach ($generalAssumptions as $generalAssumption) {
            $generalAssumption->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
