<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Authorization
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken],201);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }


    public function logoutApi()
    {
        Auth::user()->token()->revoke();
        return $this->success('User Logged Out', 200);
    }

    //Courses Controller
    //Retrieving all created courses
    public function index()
    {
        $data = Course::all();
        if ($data){
            return response()->json($data);
        }else{
            return response()->json(["Result"=>"Error"],401);
        }
    }
    //Creating new Course
    public function store(Request $request)
    {
        $course = new Course();

        $course->course_name = $request->course_name;
        $course->course_price = $request->course_price;

        //Applying validations
        $rules = array(

            'course_name' => 'required|min:4|unique:courses',
            'course_price' => 'required'
        );

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $course->save();
            return response(["Result"=>"Created !"],201);
        }
    }
    //Accessing single course

    public function show($id)
    {
        $data = Course::findOrFail($id);
        return response($data,302);
    }
    //Updating Course Details

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($request->id);

        $course->course_name = $request->course_name;
        $course->course_price = $request->course_price;
        $res = $course->save();
        if ($res){
            return response( ["Result"=>"Changes Saved !"],202);
        }else{
            return response(["Result"=>"Error !"],409);
        }
    }
    //Deleting Course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $res = $course->delete();
        if ($res){
            return (["Result"=>"Deleted !"]);
        }else{
            return (["Result"=>"Error !"]);
        }
    }
    public function create_order($id)
    {
        $order = new Order();
        $order->user_id = auth('api')->user()->id;
//        $pluck = DB::table('courses')->where('course_name',1)->get()->pluck('course_name','id');
//        return response()->json($pluck);
//        $name = json_decode(Course::find($id,'course_name'));

        //$order->course_name = $name;
        $query = Course::find($id);
        $order->course_name = $query->course_name;
        $order->course_price = $query->course_price;

        if (auth('api')->user()->balance <= $query->course_price) {
            return response(["Error" => "Not enough balance to buy course"]);
        } else {
                $new_balance = auth('api')->user()->balance - $query->course_price;
            DB::table('users')->where('id',auth('api')->user()->id)->update(array('balance'=>$new_balance));
            $order->save();
            return response(["Result" => "Saved"]);
        }
    }
}
