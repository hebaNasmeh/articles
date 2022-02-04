<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Validator;
class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the all comments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $comments = Comment::where('article_id',$id)->with('user')->get();
        return response()->json($comments);
    }

    /**
     * create comment.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        
    }

    /**
     * Store a new comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $article_id)
    {
        $input = $request->all();
        $request['user_id'] = Auth::user()->id;
        $request['article_id'] = $article_id;
        $comment = Comment::create($request->post());
        return response()->json([
            'message'=>'Comment Created Successfully!!',
            'comment'=>$comment
        ]);
    }

    /**
     * edit comment.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return response()->json($comment);
    }

    /**
     * Update comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->fill($request->post())->save();
        return response()->json([
            'message'=>'Comment Updated Successfully!!',
            'comment'=>$comment
        ]);
    }

    /**
     * Delete comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json([
            'message'=>'Comment Deleted Successfully!!'
        ]);
    }

}
