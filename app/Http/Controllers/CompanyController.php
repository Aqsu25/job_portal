<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $companies = Company::orderBy('created_at', 'ASC')->paginate(3);
        } else {

            $companies = Company::where('employer_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(3);
        }
        return view('company.list', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:companies,email',
            'website'  => 'required|url',
        ]);

        Company::create([
            'name'          => $request->name,
            'email'        => $request->email,
            'website'    => $request->website,
            'employer_id' => Auth::id(),

        ]);


        return redirect()
            ->route('companies.index')
            ->with('success', 'Company Created Successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        $request->validate([
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:companies,email,' . $id,
            'website'  => 'required|url',

        ]);
        $company->update([
            'name'          => $request->name,
            'email'        => $request->email,
            'website'    => $request->website,
            'employer_id' => Auth::id(),
        ]);
        return redirect()
            ->route('companies.index')
            ->with('success', 'Company Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $company = Company::findOrFail($id);
            $company->delete();
            return redirect()
                ->route('companies.index')
                ->with('success', 'Type Deleted Successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()
                ->route('companies.index')
                ->with('error', 'Type not found!');
        }
    }
}
