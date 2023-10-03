<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\StoreRequest;
use App\Http\Requests\Admin\Company\UpdateRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public $service;
    private $imageSaver;

    /**
     * @param $service
     */
    public function __construct(ImageSaver $imageSaver)
    {
        $this->imageSaver = $imageSaver;
    }


    public function index()
    {
        $companies = Company::all();

        return view('admin.company.index', compact('companies'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, null, 'company');
        $company = Company::create($data);

        return redirect()
            ->route('admin.company.show', ['company' => $company->id])
            ->with('success', 'Новая статья успешно создана');
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function show(Company $company)
    {
        return view('admin.company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    public function update(UpdateRequest $request, Company $company)
    {
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, $company, 'company');
        $company->update($data);

        return redirect()
            ->route('admin.company.show', ['company' => $company->id])
            ->with('success', 'Статья была успешно обновлена');
    }

    public function destroy(Company $company)
    {
        $this->imageSaver->remove($company, 'company');
        $company->delete();

        return redirect()
            ->route('admin.company.index')
            ->with('success', 'Статья успешно удалена');
    }
}
