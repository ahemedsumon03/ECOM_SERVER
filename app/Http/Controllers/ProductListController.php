<?php

namespace App\Http\Controllers;

use App\Models\ProductListModel;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    function ProductListByRemark(Request $request)
    {
        $remark = $request->remark;
        $result = ProductListModel::where('remark',$remark)->get();
        return $result;
    }

    function ProductListBySubcategory(Request $request)
    {
        $category = $request->category;
        $subcategory = $request->subcategory;
        $result = ProductListModel::where('category',$category)->where('subcategory',$subcategory)->get();
        return $result;
    }

    function ProductListByCategory(Request $request)
    {
        $category = $request->category;
        $result = ProductListModel::where('category',$category)->get();
        return $result;
    }

    function SimilarProduct(Request $request)
    {
        $subcategory = $request->subcategory;
        $result = ProductListModel::where('subcategory',$subcategory)->OrderBy('id','desc')->limit(10)->get();
        return $result;
    }
}
