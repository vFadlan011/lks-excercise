<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller {
    public function showCompanies(Request $request) {
        $view = 'companies';

        if ($request->is('admin/*')) {
            $view = "admin.companies";
        }

        $companies = Company::all();

        return view($view, [
            'title' => 'Daftar Perusahaan'
        ], compact('companies'));
    }

    public function showCompany($company_id) {
        $company = Company::find($company_id);
        return view('admin.company', [
            'title' => "Profil Perusahaan $company->name"
        ], compact('company'));
    }

    public function create() {
        return view('admin.add_company', [
            'title' => 'Tambah perusahaan'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:65535',
            'logo' => 'required|mimes:png,jpg,jpeg,svg'
        ]);

        $validatedData['logo'] = $request->file('logo')->store('company-logo');

        $company = Company::create($validatedData);
        return redirect('/admin/company');
    }
}
