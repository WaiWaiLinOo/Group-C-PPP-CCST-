<?php

namespace App\Http\Controllers\Comment;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create()
    {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->post_id = request()->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back();
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        if (Gate::allows('comment-delete', $comment)) {
            $comment->delete();
            //return back();
            return back()->with('success', 'Product deleted successfully');
        } else {
            return back()->with('error', 'Writted User can only delete');
        }
        //if ($comment->user_id == auth()->user()->id || auth()->user()->id == 1) {
        //    $comment->delete();
        //    return back();
        //} else {
        //    return back()->with('error', 'Unauthorize');
        //}
    }
}
