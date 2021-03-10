<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;

class OrderController extends Controller
{
    private $course_name;
    private $course_price;

    public function store()
{
    $order = new Order();
    $order->user_id = auth('api')->user()->id;
    //$name = DB::table('courses')->where('course_name',$course_name);
    $order->course_name = Course::
    $order->course_price = Course::where('price',$this->course_price);



//    if ($request->user_price <= $request->course_price) {
//        return response(["Error !"=>"Not enough balance to buy course"],403);
//    } else {
        $order->save();
        //return response(['Result' => 'Order completed !'], 201);
    }

public function list(){
    $order = Order::all();
    return response($order,302);
}
}
