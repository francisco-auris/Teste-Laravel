<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    private $rules_store = [
        'author'=>'required',
        'comment'=>'required',
        'video_id'=>'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idvideo)
    {
        //
        $datas = Video::find($idvideo);

        if( $datas ){
            return $datas->comments;
        }
        else {
            return response()->json(
                ['status'=>'empty', 'message'=>'Not found'], 404
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
        }else {
            try {
                $comment = new Comment();
                $comment->author = $request->input('author');
                $comment->comment = $request->input('comment');
                $comment->video_id = $request->input('video_id');
                $comment->save();
                return response()->json(
                    ['status'=>'success', 'message'=>'Comment registered'], 200
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        if( $comment ){
            $comment->delete();
            return response()->json(
                ['status'=>'success', 'message'=>'Comment is delete successfull'], 200
            );
        }else {
            return response()->json(
                ['status'=>'empty', 'message'=>'Comment not find'], 400
            );
        }
    }
}
