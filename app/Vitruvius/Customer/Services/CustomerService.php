<?php
namespace Vitruvius\Customer\Services;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Vitruvius\Customer\Models\Customer;
use Vitruvius\Customer\Requests\CustomerRequest;
use Illuminate\Database\Eloquent\Model;
use Vitruvius\Customer\Repository\CustomerRepository;

class CustomerService
{
    private $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return $this->customerRepository->all();
    }
    public function find($id)
    {
        return $this->customerRepository->find($id);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:customers,name|unique:contractors,name',
            'email' => 'required|unique:customers,email|unique:contractors,email',
            'password' => 'required|min:9',
            'address' => 'required',
            'phone' => 'required',
            'national_id' => 'required|min:14|max:14|unique:customers,national_id',
            'type' => 'required',
        ]);


        $customer = new User;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->national_id = $request->national_id;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->type = $request->type;
        $customer->save();

        return $customer;

    }
    public function edit(Customer $customer)
    {
        // return $this->customerRepository->find($customer);
        return "No";
    }

    public function update(CustomerRequest $request , Customer $model)
    {
        $customer = $this->customerRepository->find($model);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->national_id = $request->national_id;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->type = $request->type;
        $customer->save();

        return $customer;
    }

}
