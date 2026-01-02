<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Jobdetail;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jobs = Jobdetail::orderBy('created_at', 'DESC')->get();
        $jobs = Jobdetail::with(['company', 'category', 'type'])->orderBy('created_at', 'DESC')->get();
        return view('jobs.list', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $jobNature = Type::orderBy('created_at', 'DESC')->get();
        $companies = Company::orderBy('created_at', 'DESC')->get();
        return view('jobs.create', compact('categories', 'jobNature', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title'           => 'required|string|min:3',
            'vacancy'         => 'required|integer|min:1',
            'salary'          => 'nullable|string|min:3',
            'location'        => 'required|string|min:3',
            'description'     => 'nullable|string|min:10',
            'benefits'        => 'nullable|string',
            'responsibility'  => 'nullable|string|min:10',
            'qualifications'  => 'nullable|string',
            'keywords'        => 'nullable|string',
            'company_id'     => 'required|exists:companies,id',
            'category_id'     => 'required|exists:categories,id',
            'type_id'         => 'required|exists:types,id',
        ]);
        if ($validator->fails()) {
            return redirect()->route('job_portal.create')
                ->withErrors($validator)
                ->withInput();
        }
        // dd($request->all());


        Jobdetail::create([
            'title'          => $request->title,
            'vacancy'        => $request->vacancy,
            'salary'         => $request->salary,
            'location'       => $request->location,
            'description'    => $request->description,
            'benefits'       => $request->benefits,
            'responsibility' => $request->responsibility,
            'qualifications' => $request->qualifications,
            'keywords'       => $request->keywords,
            'company_id'     => $request->company_id,
            'category_id'    => $request->category_id,
            'type_id'        => $request->type_id,
        ]);


        return redirect()
            ->route('job_portal.index')
            ->with('success', 'Job posted successfully!');
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
        $job = Jobdetail::findOrFail($id);
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $jobNature = Type::orderBy('created_at', 'DESC')->get();
        $companies = Company::orderBy('created_at', 'DESC')->get();
        return view('jobs.edit', compact('job', 'categories', 'jobNature', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Jobdetail::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title'           => 'required|string|min:3',
            'vacancy'         => 'required|integer|min:1',
            'salary'          => 'nullable|string|min:3',
            'location'        => 'required|string|min:3',
            'description'     => 'nullable|string|min:10',
            'benefits'        => 'nullable|string',
            'responsibility'  => 'nullable|string|min:10',
            'qualifications'  => 'nullable|string',
            'keywords'        => 'nullable|string',
            'company_id'     => 'required|exists:companies,id',
            'category_id'     => 'required|exists:categories,id',
            'type_id'         => 'required|exists:types,id',
        ]);
        if ($validator->fails()) {
            return redirect()->route('job_portal.create')
                ->withErrors($validator)
                ->withInput();
        }


        $job->update([
            'title'          => $request->title,
            'vacancy'        => $request->vacancy,
            'salary'         => $request->salary,
            'location'       => $request->location,
            'description'    => $request->description,
            'benefits'       => $request->benefits,
            'responsibility' => $request->responsibility,
            'qualifications' => $request->qualifications,
            'keywords'       => $request->keywords,
            'company_id'     => $request->company_id,
            'category_id'    => $request->category_id,
            'type_id'        => $request->type_id,
        ]);


        return redirect()
            ->route('job_portal.index')
            ->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Jobdetail::findOrFail($id);
        if ($job) {
            $job->delete();
            return redirect()
                ->route('job_portal.index')
                ->with('success', 'Job deleted successfully!');
        }
        return redirect()
            ->route('job_portal.index')
            ->with('error', 'Not Found!');
    }
}
