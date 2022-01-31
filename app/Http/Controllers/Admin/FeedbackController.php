<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $feedbacks = Feedback::paginate(10);

        return view('admin.feedbacks.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->only(['name', 'comment']);

        $created = Feedback::create($data);

        if ($created) {
            return
                (back()->getTargetUrl() === route('admin.feedbacks.create'))
                    ? redirect()
                        ->route('admin.feedbacks.index')
                        ->with('success', 'Отзыв успешно добавлен')
                    : back()
                        ->with('success', 'Отзыв успешно добавлен');
        }

        return back()
            ->with('error', 'Не удалось добавить отзыв')
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
     * @param Feedback $feedback
     * @return Application|Factory|View
     */
    public function edit(Feedback $feedback): Application|Factory|View
    {
        return view('admin.feedbacks.edit', [
            'feedback' => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(Request $request, Feedback $feedback): RedirectResponse
    {
        $data = $request->only(['name', 'comment']);

        $updated = $feedback->fill($data)->save();

        return
            ($updated)
                ? redirect()
                    ->route('admin.feedbacks.index')
                    ->with('success', 'Отзыв успешно обновлен')
                : back()
                    ->with('error', 'Не удалось обновить отзыв')
                    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
