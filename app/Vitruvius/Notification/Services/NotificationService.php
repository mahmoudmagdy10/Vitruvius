<?php
namespace Vitruvius\Notification\Services;
use App\Models\User;
use App\Notifications\AddNewProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Model;

class NotificationService
{
    public function __construct()
    {

    }


    public function AddNotifiaction($project_id){
        $user = User::get();
       Notification::send($user, new AddNewProject($project_id));
    }

}
