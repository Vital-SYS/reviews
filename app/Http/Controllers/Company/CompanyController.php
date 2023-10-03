<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(6);
        $randomCompanies = Company::get()->random(4);

        return view('companies', compact('companies', 'randomCompanies'));
    }

    public function show(Company $company)
    {
        $date = Carbon::parse($company->created_at);
        return view('company.show', compact('company', 'date'));
    }
}
