<?php
namespace Vitruvius\User\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Vitruvius\User\Requests\ProfilePictureRequest;
use Vitruvius\User\Requests\UserRequest;

class ProfileService
{
    public function __construct()
    {
    }

    public function UploadProfilePicture(ProfilePictureRequest $request){

        $user = User::find( Auth::user()->id);

        // Save Picture
        try{
            if($request->file()) {
                $Picture_Name = time().'_'.$request->photo->getClientOriginalName();
                $request->file('photo')->move('storage/uploads/Profile-Pictures/',$Picture_Name);

            }

            if($user) {
                $user->profile_picture = $Picture_Name;
                $user->save();
            }

            return redirect()->route('profile')->with('success', 'Picture Updated Successfully');
            // return $notification;
            // return "no";

        } catch (\Exception $e) {

            return redirect()->route('proile')->with('error', 'Something Is Wrong');
        }


    }

    // public function update_password(UpdatePasswordRequest $request){

    //     $user_id = Auth::user()->id;
    //     $user = User::find($user_id);
    //     // return $request;

    //     // Validation
    //     if (Hash::check($request->old_password,$user->password) ) {
    //         // Save Password
    //         try{
    //             if($user) {
    //                 $user->password =Hash::make($request->current_password);
    //                 $user->save();
    //             }
    //             return redirect()->route('customer.edit')->with('success','Password Is Updated Successfully');

    //         } catch (\Exception $e) {

    //             return redirect()->route('customer.edit')->with('error','Password Is Failed To Update');
    //             // return "bad";
    //         }
    //         // return "Good";
    //     }else {
    //         return redirect()->route('customer.edit')->with('error','Old Password Is Not Correct');
    //     }


    // }

    // public function update(ProfileRequest $request)
    // {
    //     $id= Auth::user()->id;
    //     $customer = User::find($id);

    //     try{

    //         if (!$customer) {
    //             return redirect()->route('login');
    //         }

    //         $customer->name = $request['name'];
    //         $customer->address = $request['address'];
    //         $customer->phone = $request['phone'];
    //         $customer->national_id = $request['national_id'];
    //         $customer->save();

    //         return redirect()->route('customer.edit')->with('success','Updated Successfully');
    //         // return "yes";

    //     } catch (\Exception $e) {
    //         return redirect()->route('customer.edit')->with('error' , 'هناك خطأ يرجي المحاوله في وقت اخر');
    //         // return 'no';
    //     }

    // }
}
