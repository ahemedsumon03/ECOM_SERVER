<?php

namespace App\Http\Controllers;

use App\Models\FavouriteModel;
use App\Models\ProductListModel;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    function addToFavourite(Request $request)
    {
        $product_code = $request->input('product_code');
        $username = $request->input('username');
        $productdetails = ProductListModel::where('product_code',$product_code)->get();
        $title = $productdetails[0]['title'];
        $image = $productdetails[0]['image'];
        $price = $productdetails[0]['price'];
        $favourite_item = FavouriteModel::where('product_code',$product_code)->count();
        if($favourite_item == 0)
        {
            $result = FavouriteModel::insert([
                'image'=>$image,
                'title'=>$title,
                'price'=>$price,
                'product_code'=>$product_code,
                'username'=>$username
            ]);
            return $result;
        }
        else{
            return -1;
        }
    }

    function showFavouriteItem(Request $request)
    {
        $username = $request->myuser;
        $result = FavouriteModel::where('username',$username)->get();
        return $result;
    }

    function RemoveFavouriteItem(Request $request)
    {
        $id = $request->id;
        $result = FavouriteModel::where('id',$id)->delete();
        return $result;
    }
}
