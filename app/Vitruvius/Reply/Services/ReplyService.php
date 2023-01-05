<?php
namespace Vitruvius\Reply\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Vitruvius\Reply\Models\Reply;
use Vitruvius\Reply\Requests\ReplyRequest;
use Illuminate\Database\Eloquent\Model;

class ReplyService
{
    public function __construct()
    {

    }

    public function addReply(ReplyRequest $request){

        $user = User::find(Auth::user()->id);

        try {

            $reply = Reply::create([
                "content" => $request->reply,
                "user_id" => $user->id,
                "project_id" => $request->project_id,
                "comment_id" => $request->comment_id,
            ]);
            // return redirect()->back()->with('message','Created Successfully');
            return $reply;



        } catch (\Exception $e) {
            // return $this->returnError($e->getCode(), $e->getMessage());
            return "No";
        }

    }

    public function updateReply(ReplyRequest $request,$id){

        $reply = Reply::find($id);

        try {
            if($reply) {
                $reply->content = $request->reply;
                $reply->save();
                return $reply;
            }



        } catch (\Exception $e) {
            // return $this->returnError($e->getCode(), $e->getMessage());
            return "No";
        }

    }

    public function deleteReply($id){

        $reply = Reply::find($id);

        try {
            if($reply) {
                $reply->delete();
            }

        } catch (\Exception $e) {
            // return $this->returnError($e->getCode(), $e->getMessage());
            return "No";
        }

    }



}
