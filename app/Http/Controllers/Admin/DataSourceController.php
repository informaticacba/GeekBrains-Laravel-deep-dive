<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataSource\CreateRequest;
use App\Http\Requests\DataSource\UpdateRequest;
use App\Models\DataSource;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DataSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $sources = DataSource::paginate(10);

        return view('admin.dataSources.index', [
            'sources' => $sources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.dataSources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $created = DataSource::create($data);

        return
            ($created)
                ? redirect()
                    ->route('admin.dataSources.index')
                    ->with('success', 'Источник успешно добавлен')
                : back()
                    ->with('error', 'Не удалось добавить источник')
                    ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DataSource $dataSource
     * @return Application|Factory|View
     */
    public function edit(DataSource $dataSource): Application|Factory|View
    {
        return view('admin.dataSources.edit', [
            'dataSource' => $dataSource
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param DataSource $source
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, DataSource $source): RedirectResponse
    {
        $data = $request->validated();

        $updated = $source->fill($data)->save();

        return
            ($updated)
                ? redirect()
                    ->route('admin.dataSources.index')
                    ->with('success', 'Источник успешно добавлен')
                : back()
                    ->with('error', 'Не удалось добавить источник')
                    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DataSource $source
     * @return JsonResponse
     */
    public function destroy(DataSource $source): JsonResponse
    {
        try {
            $source->delete();

            return response()->json('ok');
        } catch (\Exception $e) {
            Log::error('DataSource error destroy', [$e]);

            return response()->json('error', 400);
        }
    }
}
