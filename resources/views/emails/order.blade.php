<div style="width: 602px; margin: 0 auto;">
    <div style="background-color: #f1f1f1; padding: 5px 0;">
        <p style="font-size: 28px; text-align: center; font-weight: 300;">Новый заказ {{$order->id}} на сайте <a href="{{env('APP_URL')}}" target="_blank">{{env('APP_NAME')}}</a></p>
    </div>
    <div style="clear:both"></div>
    <div style="width: 90%; margin: 0 auto; padding-bottom: 5%; font-family: 'Open Sans', sans-serif;">
        <div style="font-size: 18px;">
            @if(isset($order->company?->company_name    ))
                <p><strong>Название компании: </strong>{{$order->company->company_name}}</p>
                <hr>
            @endif
            @if(isset($order->name))
                <p><strong>Имя: </strong>{{$order->name}}</p>
                <hr>
            @endif
            @if(isset($order->phone))
                <p><strong>Телефон: </strong>{{$order->phone}}</p>
                <hr>
            @endif
            @if(isset($order->email))
                <p><strong>Email: </strong>{{$order->email}}</p>
                <hr>
            @endif
            @if(isset($order->orderAddress?->city))
                <p><strong>Город: </strong>{{$order->orderAddress->city}}</p>
                <hr>
            @endif
            @if(isset($order->orderAddress?->street))
                <p><strong>Улица: </strong>{{$order->orderAddress->street}}</p>
                <hr>
            @endif
            @if(isset($order->orderAddress?->house))
                <p><strong>Дом: </strong>{{$order->orderAddress->house}}</p>
                <hr>
            @endif
            @if(isset($order->orderAddress?->block))
                <p><strong>Корпус: </strong>{{$order->orderAddress->block}}</p>
                <hr>
            @endif            
            @if(isset($order->orderAddress?->floor))
                <p><strong>Этаж: </strong>{{$order->orderAddress->floor}}</p>
                <hr>
            @endif
            @if(isset($order->orderAddress?->flat))
                <p><strong>Квартира: </strong>{{$order->orderAddress->flat}}</p>
                <hr>
            @endif
            @if(isset($order->message))
                <p><strong>Комментарий: </strong>{{$order->message}}</p>
                <hr>
            @endif


                <p><strong>Способ доставки: </strong>{{$order->delivery->title}}</p>
                <p><strong>Цена доставки: </strong>{{format_price($order->delivery_price)}}</p>

                <table class="table" style="border:1px solid black;border-collapse:collapse;font-size: 14px;">
                    <tr>
                        <th style="border:1px solid black; padding: 15px 10px;">Наименование</th>
                        <th style="border:1px solid black; padding: 15px 10px;">Цена</th>
                        <th style="border:1px solid black; padding: 15px 10px;">Количество</th>
                        <th style="border:1px solid black; padding: 15px 10px;">Итого</th>
                    </tr>
                    @foreach($order->orderProducts as $product)
                        <tr>
                            <td style="border:1px solid black; padding: 15px 10px;">{{$product->title}}</td>
                            <td style="border:1px solid black; padding: 15px 10px;">{{$product->price}}</td>
                            <td style="border:1px solid black; padding: 15px 10px;">{{$product->count}}</td>
                            <td style="border:1px solid black; padding: 15px 10px;">{{format_price(($product->total_price))}}</td>
                        </tr>
                    @endforeach
                </table>

                <p><strong>Цена заказа: </strong>{{ format_price($order->price + $order->delivery_price)}} </p>

        </div>
    </div>
    <div
        style="background-color: #f1f1f1; padding-top: 1px; padding-bottom: 1px; font-family: 'Open Sans', sans-serif; font-size: 14px;">
        <div style="width: 90%;  margin: 0 auto;">
            <p>Сообщение отправлено с сайта <a href="{{env('APP_URL')}}" target="_blank">{{env('APP_NAME')}}</a></p>
        </div>
    </div>
</div>
