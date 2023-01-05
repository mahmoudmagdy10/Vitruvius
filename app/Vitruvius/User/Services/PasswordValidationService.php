<?php
namespace Vitruvius\User\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Vitruvius\User\Requests\ProfilePictureRequest;
use Vitruvius\User\Requests\UpdatePasswordRequest;
use Vitruvius\User\Requests\UserRequest;

class PasswordValidationService
{
    public function __construct()
    {
    }

    public function passwordValidate(UpdatePasswordRequest $request) {

        $user = User::find(Auth::user()->id);

        // Validation
        if (Hash::check($request->old_password,$user->password) ) {

            return $request;
        }else {
            return false;
        }
    }

}
