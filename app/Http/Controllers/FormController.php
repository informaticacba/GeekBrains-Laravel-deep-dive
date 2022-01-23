<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, RedirectResponse};

class FormController extends Controller
{
    public function addFeedback(Request $request): RedirectResponse
    {
        $arr = array_filter($request->post(), fn($key) => $key !== '_token', ARRAY_FILTER_USE_KEY);

        file_put_contents(public_path('data/feedbacks.txt'), json_encode($arr), FILE_APPEND);

        return redirect()->back();
    }

    public function dataUpload(Request $request): RedirectResponse
    {
        $arr = array_filter($request->post(), fn($key) => $key !== '_token', ARRAY_FILTER_USE_KEY);

        file_put_contents(public_path('data/dataUpload.txt'), json_encode($arr), FILE_APPEND);

        return redirect()->back();
    }
}
