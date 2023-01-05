<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vitruvius\Contractor\Requests\ContractorRequest;
use Vitruvius\Contractor\Services\ContractorService;
use Vitruvius\Customer\Requests\CustomerRequest;
use Vitruvius\Customer\Services\CustomerService;

class RegisterController extends Controller
{
    private $customerService;
    private $contractorService;

    public function __construct(CustomerService $customerService, ContractorService $contractorService)
    {
        $this->customerService = $customerService;
        $this->contractorService = $contractorService;

        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:customer')->except('logout/customer');
        // $this->middleware('guest:contractor')->except('logout/contractor');
    }

    public function registerForm()
    {
        return view('Auth.register');
    }
    protected function createUser(Request $request)
    {
        $signAs = $request->type;

        if($signAs === "Customer") {
            $customr = $this->customerService->create($request);
            Auth::login($customr);
            return redirect()->route('homepage');
            // return $customr;


        } elseif($signAs === "Contractor"){
            $contractor = $this->contractorService->create($request);
            Auth::login($contractor);
            return redirect()->route('homepage');
            // return $contractor;

        } else {
            return redirect()->route('register');
        }
    }

    // public function showCustomerRegisterForm()
    // {
    //     return view('Auth.register', ['url' => 'customer']);
    // }

    // public function showContractorRegisterForm()
    // {
    //     return view('Auth.register', ['url' => 'contractor']);
    // }

    // protected function createCustomer(CustomerRequest $request)
    // {
    //     $this->customerService->create($request);
    //     // Auth::guard('customer')->lodin();
    //     return redirect()->intended('/login');
    // }

    // protected function createContractor(ContractorRequest $request)
    // {
    //     $this->contractorService->create($request);
    //     // Auth::guard('contractor')->lodin();
    //     return redirect()->intended('/login');
    // }


}
