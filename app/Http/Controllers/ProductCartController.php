<?php

namespace App\Http\Controllers;

use App\Models\FavouriteModel;
use App\Models\NotificationModel;
use App\Models\OrderProductModel;
use App\Models\ProductCartModel;
use App\Models\ProductListModel;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnSelf;

class ProductCartController extends Controller
{
    function AddToCart(Request $request)
    {
        $color = $request->input('color');
        $size  = $request->input('size');
        $product_code = $request->input('product_code');
        $quantity = $request->input('quantity');
        $username = $request->input('username');

        $productList = ProductListModel::where('product_code',$product_code)->get();
        $image = $productList[0]['image'];
        $price = $productList[0]['price'];
        $title = $productList[0]['title'];
        $special_price = $productList[0]['special_price'];
        $shop_name = $productList[0]['shop_name'];
        $shop_code = $productList[0]['shop'];

        if($special_price == "NA")
        {
            $total_price = $quantity*$price;
            $unit_price = $price;
        }else{
            $total_price = $quantity*$special_price;
            $unit_price = $special_price;
        }

        $product_cart_item = ProductCartModel::where('product_code',$product_code)->count();

        if($product_cart_item == 0)
        {
            $result = ProductCartModel::insert([
                'image'=>$image,
                'product_name'=>$title,
                'product_code'=>$product_code,
                'shop_name'=>$shop_name,
                'shop_code'=>$shop_code,
                'product_info'=>"Color: ".$color." Size: ".$size,
                'product_quantity'=>$quantity,
                'unit_price'=>$unit_price,
                'total_price'=>$total_price,
                'username'=>$username
            ]);
            return $result;
        }
        else{
            return -1;
        }

    }

    function CountProduct(Request $request)
    {
        $username = $request->user;
        $countCartProduct = ProductCartModel::where('username',$username)->count();
        return $countCartProduct;
    }

    function ShowCartItem(Request $request)
    {
        $username = $request->user;
        $result = ProductCartModel::where('username',$username)->get();
        return $result;
    }

    function GetTotalAndCountValue(Request $request)
    {
        $myArray = [];
        $total = 0;
        $username = $request->user;
        $count_result = ProductCartModel::count();
        $total_price = ProductCartModel::where('username',$username)->get();

        foreach ($total_price as $value)
        {
            $total = $total + $value['total_price'];
        }

        $item = [
           'count_result'=>$count_result,
            'total_price'=>$total
        ];

        array_push($myArray,$item);
        return $myArray;
    }

    function RemoveProduct(Request $request)
    {
        $id = $request->id;
        $result = ProductCartModel::where('id',$id)->delete();
        return $result;
    }

    function CartItemPlus(Request $request)
    {
        $id = $request->id;
        $quantity = $request->input('quantity');
        $unit_price = $request->input('unit_price');

        $quantity = $quantity + 1;
        $total_price = $unit_price * $quantity;
        $result = ProductCartModel::where('id',$id)->update([
            'product_quantity'=>$quantity,
            'total_price'=>$total_price
        ]);

        return $result;
    }

    function CartItemMinus(Request $request)
    {
        $id = $request->id;
        $quantity = $request->input('quantity');
        $unit_price = $request->input('unit_price');

        $quantity = $quantity - 1;
        $total_price = $unit_price * $quantity;
        $result = ProductCartModel::where('id',$id)->update([
            'product_quantity'=>$quantity,
            'total_price'=>$total_price
        ]);

        return $result;
    }

    function CountFav(Request $request)
    {
        $username = $request->user;
        $countFavProduct = FavouriteModel::where('username',$username)->count();
        return $countFavProduct;
    }

    function CountNotification()
    {
        $notification = NotificationModel::count();
        return $notification;
    }

    function CountOrder(Request $request)
    {
        $username = $request->user;
        $countorderProduct = OrderProductModel::where('username',$username)->count();
        return $countorderProduct;
    }
}
