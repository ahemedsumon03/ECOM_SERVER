<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function GetNotificationList()
    {
       $result = NotificationModel::limit(10)->get();
       return $result;
    }
}
