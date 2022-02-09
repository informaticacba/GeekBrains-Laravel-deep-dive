<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\EditRequest;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Factory;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(): Application|Factory|View
    {
        return view('account.index');
    }

    public function edit(): Application|Factory|View
    {
        $user = Auth::user();

        return view('account.edit', [
            'user' => $user
        ]);
    }

    public function update(EditRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $data = $request->validated();
        if (Hash::check($data['password'], $user->password)) {
            $data['password'] = Hash::make($data['new_password']);

            $updated = $user->fill($data)
                ->save();

            if ($updated) {
                return redirect()->route('account.index')
                    ->with('success', __('messages.account.updated.success'));
            }
        }

        return back()
            ->with('error', __('messages.account.updated.error'))
            ->withInput();
    }
}
