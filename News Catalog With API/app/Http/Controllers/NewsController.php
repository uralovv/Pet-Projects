<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    //Displaying all created news
    public function index()
    {
        //
        $data = News::all();
        if ($data){
            return response()->json($data);
        }else{
            return response()->json(["Result"=>"Error occurred !"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Creating new News
    public function store(Request $request)
    {
        //
        $data = new News();
//        $data->user_id = auth('api')->user()-id;
        $data->user_id = \auth('api')->user()->id;
        $data->rubric_id = $request->rubric_id;
        $data->heading = $request->heading;
        $data->anons = $request->anons;
        $data->text = $request->text;
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();

        //Applying Validations to prevent empty values
        $rules = array(
            'rubric_id'=>'required|numeric',
            'heading'=>'required|string',
            'anons'=>'required|string',
            'text'=>'required|string',
        );
        $validator = Validator::make($request->all(),$rules);
        //If validation occurred, message is displayed and submission is rejected
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }else{
            //Else submission is accepted and new record created
            $data->save();
            return response(["Result"=>"Successfully created !"],201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = News::findOrFail($id);

        if ($data){
            return response()->json($data);
        }else{
            return response(["Result"=>"Error occurred !"],400);
        }
    }

    public function view(Request $request){
        $data = DB::table('news')->where('user_id',1);
        if ($data){
            return response()->json($data);
        }else{
            return response(["Result"=>"Error !"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //Searching using text column in News Table
    public function search($text){

        News::where("text","like","%" . $text . "%")->get();

        return News::where("text","like","%" . $text . "%")->get();
    }

    public function search_heading($heading){
        return News::where("heading","like","%" . $heading. "%")->get();
    }

    public function search_anons($anons){
        return News::where("anons","like", "%" . $anons . "%")->get();
    }

    //Searching for specific rubric
    public function search_rubric($rubric_id){

        $data = News::where("rubric_id",$rubric_id)->get();
        if ($data){
            return response()->json($data,202);
        }else{
            return response(["Result"=>"No Rubrics Found"],404);
        }
    }
    //Searching for news' author
    public function search_author($user_id){
        $data = News::where("user_id",$user_id)->get();
        if ($data){
            return response()->json($data,202);
        }else{
            return response(["Result"=>"Author Not Found"],404);
        }
    }
}
