<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderToReceiveDataUpload\CreateRequest;
use App\Http\Requests\OrderToReceiveDataUpload\UpdateRequest;
use App\Models\OrderToReceiveDataUpload;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderToReceiveDataUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $orders = OrderToReceiveDataUpload::paginate(10);

        return view('admin.ordersToReceiveDataUpload.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.ordersToReceiveDataUpload.create');
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

        $created = OrderToReceiveDataUpload::create($data);

        return
            ($created)
                ? redirect()
                    ->route('admin.ordersToReceiveDataUpload.index')
                    ->with('success', 'Заказ успешно добавлен')
                : back()
                    ->with('error', 'Не удалось добавить заказ')
                    ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param OrderToReceiveDataUpload $order
     * @return \Illuminate\Http\Response
     */
    public function show(OrderToReceiveDataUpload $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrderToReceiveDataUpload $order
     * @return Application|Factory|View
     */
    public function edit(OrderToReceiveDataUpload $order): Application|Factory|View
    {
        return view('admin.ordersToReceiveDataUpload.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param OrderToReceiveDataUpload $order
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, OrderToReceiveDataUpload $order): RedirectResponse
    {
        $data = $request->validated();

        $updated = $order->fill($data)->save();

        return
            ($updated)
                ? redirect()
                    ->route('admin.ordersToReceiveDataUpload.index')
                    ->with('success', 'Заказ успешно обновлен')
                : back()
                    ->with('error', 'Не удалось обновить заказ')
                    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderToReceiveDataUpload $order
     * @return JsonResponse
     */
    public function destroy(OrderToReceiveDataUpload $order): JsonResponse
    {
        try {
            $order->delete();

            return response()->json('ok');
        } catch (\Exception $e) {
            Log::error('Order error destroy', [$e]);

            return response()->json('error', 400);
        }
    }
}
