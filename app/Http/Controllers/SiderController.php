<?php

namespace App\Http\Controllers;

use App\Models\SliderModel;
use Illuminate\Http\Request;

class SiderController extends Controller
{
   function SlideInfo()
   {
       $result = SliderModel::all();
       return $result;
   }
}
