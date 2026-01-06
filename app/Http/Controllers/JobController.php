<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Jobdetail;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Jobdetail::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->with('type')->paginate(10);
        return view('jobs.list', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $jobNature = Type::orderBy('created_at', 'DESC')->where('status', 1)->get();
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
            'location'        => 'required|string|min:3',
            'experience'      => 'required',
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
            'experience'    => $request->experience,
            'benefits'       => $request->benefits,
            'responsibility' => $request->responsibility,
            'qualifications' => $request->qualifications,
            'keywords'       => $request->keywords,
            'user_id' => Auth::user()->id,
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
        $categories = Category::orderBy('created_at', 'DESC')->where('status', 1)->get();
        $jobNature = Type::orderBy('created_at', 'DESC')->where('status', 1)->get();
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
            'location'        => 'required|string|min:3',
            'experience'      => 'required',
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
            'experience'    => $request->experience,
            'benefits'       => $request->benefits,
            'responsibility' => $request->responsibility,
            'qualifications' => $request->qualifications,
            'keywords'       => $request->keywords,
            'user_id' => Auth::user()->id,
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
        try {
            $type = Type::findOrFail($id);
            $type->delete();

            return redirect()
                ->route('job_portal.index')
                ->with('success', 'Type Deleted Successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()
                ->route('job_portal.index')
                ->with('error', 'Type not found!');
        }
    }

    public function findJob(Request $request)
    {
        $categories = Category::where('status', 1)->orderBy('created_at', 'ASC')->get();
        $types = Type::where('status', 1)->orderBy('created_at', 'ASC')->get();
        $jobdetails = Jobdetail::where('status', 1)->with('type');
        // search using keyword
        if (!empty($request->keywords)) {
            $jobdetails = $jobdetails->where(function ($q) use ($request) {
                $q->orWhere('title', 'LIKE', '%' . $request->keywords . '%')
                    ->orWhere('keywords', 'LIKE', '%' . $request->keywords . '%');
            });
        }

        // search using location
        if (!empty($request->location)) {
            $jobdetails = $jobdetails->where('location', $request->location);
        }
        // search using category
        if (!empty($request->category_id)) {
            $jobdetails = $jobdetails->where('category_id', $request->category_id);
        }

        // search using jobtype
        if (!empty($request->job_types)) {
            $jobdetails = $jobdetails->whereIn('type_id', $request->job_types);
        }

        // search using experience
        if (!empty($request->experience)) {
            if ($request->experience === '10_plus') {
                $jobdetails = $jobdetails->where('experience', '>=', 10);
            } else {
                $jobdetails = $jobdetails->where('experience', $request->experience);
            }
        }
        //   jobdetail
        if ($request->sort == '1') {
            $jobdetails = $jobdetails->orderBy('created_at', 'DESC');
        } else {
            $jobdetails = $jobdetails->orderBy('created_at', 'ASC');
        }

        $jobdetails = $jobdetails->paginate(6);
        return view('jobs.findJobs', compact('categories', 'types', 'jobdetails'));
    }
}
