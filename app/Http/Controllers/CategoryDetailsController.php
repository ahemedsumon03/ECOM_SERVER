<?php

namespace App\Http\Controllers;

use App\Models\CategoryLavel1Model;
use App\Models\CategoryLavel2Model;
use Illuminate\Http\Request;

class CategoryDetailsController extends Controller
{
   function GetCategoryDetails()
   {
       $cat_one_info = CategoryLavel1Model::all();
       $categoryArray = [];
       foreach ($cat_one_info as $value)
       {
           $cat_two_info = CategoryLavel2Model::where('catone_name',$value['catone_name'])->get();

           $item = [
               'catone_name'=>$value['catone_name'],
               'catone_image'=>$value['catone_image'],
               'cattwo_name'=>$cat_two_info
           ];
           array_push($categoryArray,$item);
       }

       return $categoryArray;
   }
}
