<?php

namespace App\Http\Controllers;

use App\Models\FavouriteModel;
use App\Models\NotificationModel;
use App\Models\OrderProductModel;
use App\Models\ProductCartModel;
use Illuminate\Http\Request;

class CountController extends Controller
{
    function CountProduct()
    {
        $countArray = [];
        $cartCount = ProductCartModel::count();
        $favCount = FavouriteModel::count();
        $notificationCount = NotificationModel::count();
        $orderCount = OrderProductModel::count();

        $item = [
            'cartCount'=>$cartCount,
            'favCount'=>$favCount,
            'notificationCount'=>$notificationCount,
            'orderCount'=>$orderCount
        ];

        array_push($countArray,$item);

        return $countArray;
    }
}
