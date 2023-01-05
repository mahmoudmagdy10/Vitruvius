<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vitruvius\Contractor\Models\Contractor;
use Vitruvius\Contractor\Requests\ContractorRequest;
use Vitruvius\Contractor\Services\ContractorService;

class ContractorController extends Controller
{
    private $contractorService;
    public function __construct(ContractorService $contractorService){
        $this->contractorService = $contractorService;
    }

    public function index()
    {
        return $this->contractorService->index();
    }


    public function create()
    {
        return view('Auth.register');
    }


    public function store(ContractorRequest $request)
    {
        $contractor = $this->contractorService->create($request);
        Auth::login($contractor);
        return redirect('/');


    }


    public function show(Contractor $contractor)
    {
        return $this->contractorService->find($contractor);
    }

    public function edit(Contractor $contractor)
    {
        return $contractor;
    }

    public function update(ContractorRequest $request, Contractor $contractor)
    {
        return $this->contractorService->update($request,$contractor);
    }

    public function destroy(ContractorRequest $contractor)
    {
        return $contractor;
    }
}
