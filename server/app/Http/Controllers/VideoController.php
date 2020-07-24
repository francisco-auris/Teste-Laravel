<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    private $rules_store = [
        'title'=>"required",
        'url'=>'required',
        'category_id'=>'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Video::all();
    }

    public function videoPerCategory( $id ){
        if( $id ){
            $cat = Category::find( $id );
            if( $cat ){
                return $cat->videos;
            }
            else {
                return response()->json(
                    ['status'=>'empty', 'message'=>'Videos not fin for category'], 404
                );
            }
        }
        else {
            return response()->json(
                ['status'=>'empty', 'message'=>'id category empty'], 401
            );
        }
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
        $validate = Validator::make($request->all(), $this->rules_store);
        if( $validate->fails() ){
            return response()->json(
                ['status'=>'validate', 'message'=>$validate->errors()], 400
            );
        }
        else {
            try {
                $video = new Video();
                $video->title = $request->input('title');
                $video->url = $request->input('url');
                $video->category_id = $request->input('category_id');
                $video->save();
                return response()->json(
                    ['status'=>'success', 'message'=>'Videdo register successfull'], 200
                );
            }
            catch( Exception $e ){
                return response()->json(
                    ['status'=>"error", 'message'=>$e->getMessage()], 500
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
