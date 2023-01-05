<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
    }

    public function index() {
        return view('Auth.login');
    }

    public function check_auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('homepage');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    // public function showCustomerLoginForm()
    // {
    //     return view('Auth.Defaultlogin', ['url' => 'customer']);
    // }

    // public function customerLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'   => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);

    //     if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         // return redirect()->intended('/homepage');
    //         return "Customer";
    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }

    // public function showContractorLoginForm()
    // {
    //     return view('Auth.Defaultlogin', ['url' => 'contractor']);
    // }

    // public function contractorLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'   => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);

    //     if (Auth::guard('contractor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         // return redirect()->intended('/homepage');
    //         return "Contractor";

    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login');

    }
    // public function logoutCustomer(Request $request) {

    //     Auth::guard('customer')->logout();
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     return redirect('/login');

    // }
    // public function logoutContractor(Request $request) {

    //     Auth::guard('contractor')->logout();
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     return redirect('/login');

    // }


}
