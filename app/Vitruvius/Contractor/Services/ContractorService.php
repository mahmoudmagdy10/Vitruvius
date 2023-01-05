<?php
namespace Vitruvius\Contractor\Services;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Vitruvius\Contractor\Models\Contractor;
use Illuminate\Database\Eloquent\Model;
use Vitruvius\Contractor\Repository\ContractorRepository;
use Vitruvius\Contractor\Requests\ContractorRequest;

class ContractorService
{
    private $contractorRepository;
    public function __construct(ContractorRepository $contractorRepository)
    {
        $this->contractorRepository = $contractorRepository;
    }

    public function index()
    {
        return $this->contractorRepository->all();
    }
    public function find(Contractor $model)
    {
        return $this->contractorRepository->find($model);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:contractors,name|unique:customers,name',
            'email' => 'required|unique:contractors,email|unique:customers,email',
            'password' => 'required|min:9',
            'address' => 'required',
            'phone' => 'required',
            'tax_record' => 'required|unique:contractors,tax_record',
        ]);

        $contractor = new User;
        $contractor->name = $request->name;
        $contractor->email = $request->email;
        $contractor->password = $request->password;
        $contractor->tax_record = $request->tax_record;
        $contractor->phone = $request->phone;
        $contractor->address = $request->address;
        $contractor->type = $request->type;
        $contractor->save();

        return $contractor;

    }
    public function edit(Contractor $contractor)
    {
        return $this->contractorRepository->find($contractor);
        // return "No";
    }

    public function update(ContractorRequest $request , Contractor $model)
    {
        $Contractor = $this->contractorRepository->find($model);
        $Contractor->name = $request->name;
        $Contractor->email = $request->email;
        $Contractor->password = $request->password;
        $Contractor->national_id = $request->national_id;
        $Contractor->phone = $request->phone;
        $Contractor->address = $request->address;
        $Contractor->save();

        return $Contractor;
    }

}
