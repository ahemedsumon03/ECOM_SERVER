<?php

namespace App\Http\Controllers;

use App\Models\ProductDetailsModel;
use App\Models\ProductListModel;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
   function SelectProductByCode(Request $request)
   {
       $code = $request->code;
       $product_details = ProductDetailsModel::where('product_code',$code)->get();
       $product_list = ProductListModel::where('product_code',$code)->get();

       $item = [
           'product_details'=>$product_details,
           'product_list'=>$product_list
       ];

       return $item;
   }
}
