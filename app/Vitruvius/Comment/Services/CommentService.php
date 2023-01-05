<?php
namespace Vitruvius\Comment\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Vitruvius\Comment\Models\Comment;
use Vitruvius\Comment\Requests\CommentRequest;
use Illuminate\Database\Eloquent\Model;

class CommentService
{
    public function __construct()
    {

    }

    public function addComment(CommentRequest $request ,$project_id){

        $user = User::find(Auth::user()->id);

        try {

            $comment = Comment::create([
                "content" => $request->comment,
                "user_id" => $user->id,
                "project_id" => $project_id,
            ]);
            // return redirect()->back()->with('message','Created Successfully');
            return $comment;



        } catch (\Exception $e) {
            // return $this->returnError($e->getCode(), $e->getMessage());
            return "No";
        }

    }
    public function updateComment(CommentRequest $request,$id){

        $comment = Comment::find($id);

        try {
            if($comment) {
                $comment->content = $request->comment;
                $comment->save();
                return $comment;
            }



        } catch (\Exception $e) {
            // return $this->returnError($e->getCode(), $e->getMessage());
            return "No";
        }

    }
    public function deleteComment($id){

        $comment = Comment::find($id);

        try {
            if($comment) {
                $comment->delete();
            }

        } catch (\Exception $e) {
            // return $this->returnError($e->getCode(), $e->getMessage());
            return "No";
        }

    }



}
