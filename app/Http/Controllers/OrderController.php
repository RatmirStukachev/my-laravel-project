<?php

namespace App\Http\Controllers;

use App\Mail\OrderSendMail;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\PageService;
use App\Services\OrderService;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Services\Support\TextService;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private CartService $cartService,
        private PageService $pageService
    ){}
    
    public function createOrder(OrderRequest $request)
    {
        try {
            $order = $this->orderService->createOrder($request);
            
            $emails = TextService::getSettingValue('contacts', 'email');
            $emails = array_filter(array_map('trim', explode(',', $emails)));
            
            if ($emails) {
                Mail::to($emails)->send(new OrderSendMail($order));
            }
            
            if ($request->email) {
                Mail::to($request->email)->send(new OrderSendMail($order));
            }
            
            return response()->json([
                'success' => true,
                'redirect' => route('order.success', $order->id),
            ]);
        } catch (\Exception $ex) {
            Log::error(['Ошибка при создании заказа: ' => $ex->getMessage(), 'trace' => $ex->getTraceAsString()]);
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при создании заказа',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
