<?php

namespace App\Http\Controllers\Comment;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Contracts\Services\comment\CommentServiceInterface;

class CommentController extends Controller
{
    /**
     * comment interface
     */
    private $commentInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(CommentServiceInterface $commentServiceInterface)
    {
        $this->commentInterface = $commentServiceInterface;
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comment = $this->commentInterface->getComment();
        return back();
    }

    /**
     * To delelte comment
     * @param $id
     * @param $request
     * @return view
     */
    public function delete($id)
    {
        $comment = $this->commentInterface->deleteComment($id);
        if (Gate::allows('comment-delete', $comment)) {
            $comment->delete();
            return back()->with('success', 'Product deleted successfully');
        } else {
            return back()->with('error', 'Writted User can only delete');
        }
    }
}
