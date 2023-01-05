<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vitruvius\Comment\Models\Comment;
use Vitruvius\Reply\Models\Reply;
use Vitruvius\Reply\Requests\ReplyRequest;
use Vitruvius\Reply\Services\ReplyService;

class ReplyController extends Controller
{
    private $replyService;

    public function __construct(ReplyService $replyService) {
        $this->replyService = $replyService;

    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(ReplyRequest $request)
    {
        $reply = $this->replyService->addReply($request);
        $user = User::find($reply->user_id);
        $comment = Comment::find($reply->comment_id);
        return response()->json([
            "reply" => $reply,
            "user" => $user,
            "comment" => $comment,
        ]);
    }

    public function show(Reply $reply)
    {
        //
    }


    public function edit(Reply $reply)
    {
        //
    }


    public function update(ReplyRequest $request,$id)
    {
        $newReply = $this->replyService->updateReply($request,$id);
        return response()->json($newReply);

    }


    public function destroy($id)
    {
        $this->replyService->deleteReply($id);
        return response()->json("Reply Deleted Successfully :)");


    }
}
