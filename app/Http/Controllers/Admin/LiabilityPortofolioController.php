<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLiabilityPortofolioRequest;
use App\Http\Requests\StoreLiabilityPortofolioRequest;
use App\Http\Requests\UpdateLiabilityPortofolioRequest;
use App\Models\Biaya;
use App\Models\LiabilityPortofolio;
use App\Models\YieldCurve;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LiabilityPortofolioController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('liability_portofolio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPortofolios = LiabilityPortofolio::with(['biaya', 'yield_curve', 'media'])->get();

        return view('admin.liabilityPortofolios.index', compact('liabilityPortofolios'));
    }

    public function create()
    {
        abort_if(Gate::denies('liability_portofolio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayas = Biaya::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityPortofolios.create', compact('biayas', 'yield_curves'));
    }

    public function store(StoreLiabilityPortofolioRequest $request)
    {
        $liabilityPortofolio = LiabilityPortofolio::create($request->all());

        if ($request->input('source_file', false)) {
            $liabilityPortofolio->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $liabilityPortofolio->id]);
        }

        return redirect()->route('admin.liability-portofolios.index');
    }

    public function edit(LiabilityPortofolio $liabilityPortofolio)
    {
        abort_if(Gate::denies('liability_portofolio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayas = Biaya::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityPortofolio->load('biaya', 'yield_curve');

        return view('admin.liabilityPortofolios.edit', compact('biayas', 'liabilityPortofolio', 'yield_curves'));
    }

    public function update(UpdateLiabilityPortofolioRequest $request, LiabilityPortofolio $liabilityPortofolio)
    {
        $liabilityPortofolio->update($request->all());

        if ($request->input('source_file', false)) {
            if (! $liabilityPortofolio->source_file || $request->input('source_file') !== $liabilityPortofolio->source_file->file_name) {
                if ($liabilityPortofolio->source_file) {
                    $liabilityPortofolio->source_file->delete();
                }
                $liabilityPortofolio->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
            }
        } elseif ($liabilityPortofolio->source_file) {
            $liabilityPortofolio->source_file->delete();
        }

        return redirect()->route('admin.liability-portofolios.index');
    }

    public function show(LiabilityPortofolio $liabilityPortofolio)
    {
        abort_if(Gate::denies('liability_portofolio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPortofolio->load('biaya', 'yield_curve');

        return view('admin.liabilityPortofolios.show', compact('liabilityPortofolio'));
    }

    public function destroy(LiabilityPortofolio $liabilityPortofolio)
    {
        abort_if(Gate::denies('liability_portofolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPortofolio->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityPortofolioRequest $request)
    {
        $liabilityPortofolios = LiabilityPortofolio::find(request('ids'));

        foreach ($liabilityPortofolios as $liabilityPortofolio) {
            $liabilityPortofolio->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('liability_portofolio_create') && Gate::denies('liability_portofolio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new LiabilityPortofolio();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
