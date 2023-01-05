<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vitruvius\Comment\Models\Comment;
use Vitruvius\Comment\Requests\CommentRequest;
use Vitruvius\Comment\Services\CommentService;
use Vitruvius\Project\Models\Project;

class CommentController extends Controller
{

    private $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;

    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(CommentRequest $request, $project_id)
    {
        $comment = $this->commentService->addComment($request, $project_id);
        $user = User::find($comment->user_id);
        return response()->json([
            "comment" => $comment,
            "user" => $user,
        ]);
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(CommentRequest $request,$id)
    {
        $newComment = $this->commentService->updateComment($request,$id);
        return response()->json($newComment);

    }


    public function destroy($id)
    {
        $this->commentService->deleteComment($id);
        return response()->json("Comment Deleted Successfully :)");


    }
}
