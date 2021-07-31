<?php

namespace App\Http\Controllers;

use App\Models\OrderProductModel;
use App\Models\ProductCartModel;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    function OrderProduct(Request $request)
    {
        $city = $request->input('city');
        $invoice_no = $request->input('invoice_no');
        $mobile_no = $request->input('mobile_no');
        $name = $request->input('name');
        $payment_method = $request->input('payment_method');
        $delivery_address = $request->input('delivery_address');
        $delivery_charge = $request->input('delivery_charge');
        $username = $request->input('username');

        date_default_timezone_set('Asia/Dhaka');
        $order_time = date('h:i:sa');
        $order_date = date("d-m-Y");
        $order_status = "Pending";

        $CartList = ProductCartModel::where('username',$username)->get();
        $cartInsertDeleteResult = "";
        foreach ($CartList as $value)
        {
            $resultInsert = OrderProductModel::insert([
                'invoice_no'=>"C".$invoice_no,
                'product_name'=>$value['product_name'],
                'product_code'=>$value['product_code'],
                'shop_name'=>$value['shop_name'],
                'shop_code'=>$value['shop_code'],
                'product_info'=>$value['product_info'],
                'product_quantity'=>$value['product_quantity'],
                'unit_price'=>$value['unit_price'],
                'total_price'=>$value['total_price'] + $delivery_charge,
                'mobile_no'=>$mobile_no,
                'username'=>$username,
                'name'=>$name,
                'payment_method'=>$payment_method,
                'delivery_address'=>$delivery_address,
                'delivery_charge'=>$delivery_charge,
                'city'=>$city,
                'order_date'=>$order_date,
                'order_time'=>$order_time,
                'order_status'=>$order_status
            ]);

            if($resultInsert == 1)
            {
                $resultDelete = ProductCartModel::where('id',$value['id'])->delete();
                if($resultDelete == 1)
                {
                    $cartInsertDeleteResult = 1;
                }
                else{
                    $cartInsertDeleteResult = 0;
                }
            }
        }
        return $cartInsertDeleteResult;
    }

    function ShowOrderProduct(Request $request)
    {
        $username = $request->user;
        $result = OrderProductModel::where('username',$username)->get();
        return $result;
    }
}
