<?php

namespace App\Http\Controllers;

use App\Models\ProductListModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function GetSearchItem(Request $request)
    {
        $searchKey = $request->key;
        $result = ProductListModel::where('title','LIKE',"%{$searchKey}%")->get();
        return $result;
    }
}
