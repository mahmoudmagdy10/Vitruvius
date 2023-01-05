<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Vitruvius\User\Requests\ProfilePictureRequest;
use Vitruvius\User\Requests\UpdatePasswordRequest;
use Vitruvius\User\Requests\UserRequest;
use Vitruvius\User\Services\PasswordValidationService;

class UserController extends Controller
{
    private $passwordValidationService;
    public function __construct(PasswordValidationService $passwordValidationService)
    {
        $this->passwordValidationService = $passwordValidationService;
    }
    public function showProfilePage()
    {
        if(Auth::check()){
            try{
                $user = User::select()->find(Auth::user()->id);
                if (!$user) {
                    return redirect()->route('login');
                } else {
                    return view('pages.personal.profile', compact('user'));
                }
            } catch (\Exception $e) {
                return redirect()->route('login');
            }
        } else{
            return redirect()->route('login');
        }

    }


    public function updateProfilePicture(ProfilePictureRequest $request)
    {
        $user = User::find(Auth::user()->id);

    // Save Picture
        try{
            if($request->file()) {
                $Picture_Name = time().'_'.$request->photo->getClientOriginalName();
                $request->file('photo')->move('storage/images/Profile-Pictures/'.$user->name.'/',$Picture_Name);

            }

            if($user) {
                $user->profile_photo_path = $Picture_Name;
                $user->save();
            }

            return redirect()->route('user.showProfilePage');

        } catch (\Exception $e) {

            // return "No";
            return redirect()->route('profile')->with('error', 'Not Updated !!');
        }


    }
    public function editProfilePage()
    {
        try{
            $user = User::find(Auth::user()->id);
            if (!$user) {
                return redirect()->route('profile')->with(['error' => 'هذه اللغة غير موجوده']);
            } else {
                return view('pages.personal.edit', compact('user'));
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function updateUserPassword(UpdatePasswordRequest $request){

        $user = User::find(Auth::user()->id);
        $validate = $this->passwordValidationService->passwordValidate($request);
        // return $validate;
        if($validate) {
            // return $validate;


            // Save Password
            try{
                if($user) {
                    $user->password = $request->current_password;
                    $user->save();
                }
                return redirect()->route('user.editProfilePage')->with('success','Password Is Updated Successfully');

            } catch (\Exception $e) {

                return redirect()->route('user.editProfilePage')->with('error','Password Is Failed To Update');
            }
        }


    }

    public function updateUserData(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // return $request;

        try{

            if (!$user) {
                return redirect()->route('login');
            }

            $user->name = $request->name;
            $user->address = $request->address;
            $user->phone = $request->phone;

            if($user->type == "Customer"){
                $user->national_id = $request->national_id;
            }

            if($user->type == "Contractor"){
                $user->tax_record = $request->tax_record;
            }
            $user->save();
            return redirect()->route('user.editProfilePage')->with('success','You Data Updated Successfully');
            // return $request;

        } catch (\Exception $e) {
            return redirect()->route('user.editProfilePage')->with('error' , 'هناك خطأ يرجي المحاوله في وقت اخر');
            // return "Error";
        }

    }
}
