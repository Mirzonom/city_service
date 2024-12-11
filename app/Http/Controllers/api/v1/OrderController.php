<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Добавление новой заявки
     * @param OrderStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(OrderStoreRequest $request)
    {
        Order::create(
            [
                "subject" => $request->subject,
                "message" => $request->message,
                "user_id" => Auth::id()
            ]
        );

        return response()
            ->json(["statue" => true])
            ->setStatusCode(201, "Order created.");
    }


    /**
     * Получение личных заявок
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        $orders = Order::where("user_id", Auth::id())->get();

        return response()
            ->json(["status" => true, "orders" => $orders])
            ->setStatusCode(200, "Orders list.");
    }
}
