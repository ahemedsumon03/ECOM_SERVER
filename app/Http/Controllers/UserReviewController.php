<?php

namespace App\Http\Controllers;

use App\Models\UserReviewModel;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{

    function AddReviewData(Request $request)
    {
       $product_code = $request->input('product_code');
       $product_name = $request->input('product_name');
       $username = $request->input('username');
       $userPhoto = $request->input('userPhoto');
       $reviewer_name = $request->input('reviewer_name');
       $reviewer_rating = $request->input('reviewer_rating');
       $reviewer_comments = $request->input('reviewer_comments');

       $result = UserReviewModel::insert([
           'product_code'=>$product_code,
           'product_name'=>$product_name,
           'user_name'=>$username,
           'user_photo'=>$userPhoto,
           'reviewer_name'=>$reviewer_name,
           'reviewer_rating'=>$reviewer_rating,
           'reviewer_comments'=>$reviewer_comments
       ]);
       return $result;
    }


   function GetUserReview(Request $request)
   {
       $code = $request->code;
       $result = UserReviewModel::where('product_code',$code)->OrderBy('id','desc')->limit(5)->get();
       return $result;
   }
}
