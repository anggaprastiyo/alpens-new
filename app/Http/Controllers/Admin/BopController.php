<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBopRequest;
use App\Http\Requests\StoreBopRequest;
use App\Http\Requests\UpdateBopRequest;
use App\Models\Bop;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BopController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('bop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bops = Bop::all();

        return view('admin.bops.index', compact('bops'));
    }

    public function create()
    {
        abort_if(Gate::denies('bop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bops.create');
    }

    public function store(StoreBopRequest $request)
    {
        $bop = Bop::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bop->id]);
        }

        return redirect()->route('admin.bops.index');
    }

    public function edit(Bop $bop)
    {
        abort_if(Gate::denies('bop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bops.edit', compact('bop'));
    }

    public function update(UpdateBopRequest $request, Bop $bop)
    {
        $bop->update($request->all());

        return redirect()->route('admin.bops.index');
    }

    public function show(Bop $bop)
    {
        abort_if(Gate::denies('bop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bops.show', compact('bop'));
    }

    public function destroy(Bop $bop)
    {
        abort_if(Gate::denies('bop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bop->delete();

        return back();
    }

    public function massDestroy(MassDestroyBopRequest $request)
    {
        $bops = Bop::find(request('ids'));

        foreach ($bops as $bop) {
            $bop->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bop_create') && Gate::denies('bop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Bop();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
