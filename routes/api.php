<?php

use App\Http\Controllers\CategoryDetailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiderController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// For Visitor
Route::get('/SendVisitorDetails',[VisitorController::class,'SendVisitorDetails']);

//Contact Info
Route::post('/SendContactData',[ContactController::class,'SendContactData']);

//Site Info
Route::get('/SiteDetails',[SiteInfoController::class,'SiteDetails']);

// Category
Route::get('/GetCategoryDetails',[CategoryDetailsController::class,'GetCategoryDetails']);

//ProductListByRemark
Route::get('/ProductListByRemark/{remark}',[ProductListController::class,'ProductListByRemark']);

//ProductListBySubcategory
Route::get('/ProductListBySubcategory/{category}/{subcategory}',[ProductListController::class,'ProductListBySubcategory']);

//ProductListByCategory
Route::get('/ProductListByCategory/{category}',[ProductListController::class,'ProductListByCategory']);

//Slider
Route::get('/SlideInfo',[SiderController::class,'SlideInfo']);

//Notification
Route::get('/GetNotificationList',[NotificationController::class,'GetNotificationList']);

//ProductDetails
Route::get('/SelectProductByCode/{code}',[ProductDetailsController::class,'SelectProductByCode']);

// Search Data
Route::get('/GetSearchItem/{key}',[SearchController::class,'GetSearchItem']);

//For User
Route::post('/AddUser',[UserController::class,'AddUser']);
Route::post('/GetUser',[UserController::class,'GetUser']);

//Similar Product
Route::get('/SimilarProduct/{subcategory}',[ProductListController::class,'SimilarProduct']);

//User Review
Route::get('/GetUserReview/{code}',[UserReviewController::class,'GetUserReview']);

//Add to Cart
Route::post('/AddToCart',[ProductCartController::class,'AddToCart']);

//Count add To cart
Route::get('/CountProduct/{user}',[ProductCartController::class,'CountProduct']);

//Count add To fav
Route::get('/CountFav/{user}',[ProductCartController::class,'CountFav']);

//Count add To notification
Route::get('/CountNotification',[ProductCartController::class,'CountNotification']);

//count add To order

Route::get('/CountOrder/{user}',[ProductCartController::class,'CountOrder']);

//Add To Favourite
Route::post('/addToFavourite',[FavouriteController::class,'addToFavourite']);

//Show Favourite Item
Route::get('/showFavouriteItem/{myuser}',[FavouriteController::class,'showFavouriteItem']);

//Show Cart Item
Route::get('/ShowCartItem/{user}',[ProductCartController::class,'ShowCartItem']);

//Show cart count and total_price
Route::get('/GetTotalAndCountValue/{user}',[ProductCartController::class,'GetTotalAndCountValue']);

//Remove Cart Item
Route::post('/RemoveProduct/{id}',[ProductCartController::class,'RemoveProduct']);

//Remove Favourite Item
Route::post('/RemoveFavouriteItem/{id}',[FavouriteController::class,'RemoveFavouriteItem']);

//Cart Item Plus
Route::post('/CartItemPlus/{id}',[ProductCartController::class,'CartItemPlus']);

//Cart Item Minus
Route::post('/CartItemMinus/{id}',[ProductCartController::class,'CartItemMinus']);

//Product Order
Route::post('/OrderProduct',[OrderProductController::class,'OrderProduct']);

//Order Show
Route::get('/ShowOrderProduct/{user}',[OrderProductController::class,'ShowOrderProduct']);

//Add Review
Route::post('/AddReviewData',[UserReviewController::class,'AddReviewData']);

//Count All
Route::get('/CountProduct',[CountController::class,'CountProduct']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
