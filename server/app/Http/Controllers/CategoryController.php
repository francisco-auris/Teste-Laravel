<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private $rules_store = [
        'title' => 'required|max:150'
    ];
    private $rules_update = [
        'favorite' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Category::all();
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
        $validate = Validator::make( $request->all(), $this->rules_store );
        if( $validate->fails() ){
            return response()->json(
                ['status'=>'validate', 'message'=>$validate->errors()], 400
            );
        }
        else {
            try {
                Category::Create($request->all());
                return response()->json(
                    ['status'=>'success', 'message'=>'Category register successfull'], 200
                );
            }
            catch( Exception $e ){
                return response()->json(
                    ['status'=>'error', 'message'=>$e->getMessage()], 500
                );
            }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = Validator::make($request->all(), $this->rules_update);
        if( $validate->fails() ){
            return response()->json(
                ['status'=>'validate', 'message'=>$validate->errors()], 400
            );
        }
        else {
            try {
                $category = Category::find($id);
                $category->favorite = $request->input('favorite');
                $category->save();
                return response()->json(
                    ['status'=>'success', 'message'=>'Update successfull'], 200
                );
            }
            catch( Exception $e ){
                return response()->json([
                    'status'=>'error', 'message'=>$e->getMessage()
                ], 500);
            }
        }
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
