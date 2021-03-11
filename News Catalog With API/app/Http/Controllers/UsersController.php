<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Displaying all users
    public function index()
    {
        //
        $data = User::all();
        return response()->json($data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = User::findOrFail($id);
        if ($data){
            return response()->json($data);
        }else{
            return response(["Result"=>"User Not Found"],404);
        }
    }
    public function upload(Request $request, $id){
        $data = User::findOrFail($id);
        $result = $request->file('avatar')->store('Avatars');
        //$data->avatar = URL::asset($result);

        //Applying validations for preventing user submitting non-image files
        $rules = array(
            'avatar'=>'required|image|max:4096'
        );
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()){
            return response()->json($validator->errors(),401);

        }else{
            $data->avatar = $result;
            $data->save();
            return response()->json(["Result"=>"Avatar Changed !"]);
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
}
