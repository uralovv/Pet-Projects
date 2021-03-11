<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RubricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //displaying all created rubrics
        $data = Rubric::all();
        if ($data){
            return response()->json($data);
        }else{
            return response()->json(["Result"=>"Error occurred"],401);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Adding new Rubric
        $data = new Rubric();
        $data->heading = $request->heading;
        $data->sub_heading = $request->sub_heading;
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();

        //Applying Validations for preventing empty submission and duplicated sub_heading variable

        $rules = array(
            'heading'=>'required|min:5|max:40|',
            'sub_heading'=>'required|min:5|unique:rubrics'
        );
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json($validator->errors(),401);
        }else {
             $data->save();
            return response(["Result"=>"New Rubric Created !"],201);
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
        //
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
}
