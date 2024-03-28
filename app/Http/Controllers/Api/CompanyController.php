<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Services\CompanyService;
use App\Models\Company;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyService $companyService,
    ) {
    }

    public function index()
    {
        return $this->companyService->index();
    }

    public function store(CompanyRequest $request)
    {
        return $this->companyService->store($request->validated());
    }

    public function show(Company $company)
    {
        return $this->companyService->show($company);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        return $this->companyService->update($request->validated(),$company);
    }

    public function destroy(Company $company)
    {
        return $this->companyService->destroy($company);
    }
}