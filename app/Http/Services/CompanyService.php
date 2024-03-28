<?php

namespace App\Http\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Carbon\Carbon;
use Exception;
use PhpParser\Node\Stmt\Catch_;

class CompanyService extends Controller
{
    public function __construct(
       private Company $company,
    ) {
    }

    public function index()
    {
        return CompanyResource::collection($this->company::all());
    }

    public function store(CompanyRequest $request)
    {
        try{
            $this->company->beginTransaction();
            $company = $this->company->create($request->validated());
            $this->company->commit();
            return new CompanyResource($company);
        }catch(Exception $e){
            $this->company->rollback();
            return $this->sendError($e->getMessage());
        }
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return new CompanyResource($company);
    }

    public function destroy(Company $company)
    {
        $now =Carbon::now();
        $now = $now->toDateTimeString();
        $company->update(
            [
            "id"=>$company->id,
            "deleted_at"=>$now,
            ]
        );
        return response()->noContent();
    }
}