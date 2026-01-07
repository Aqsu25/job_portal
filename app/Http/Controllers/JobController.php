<?php

namespace App\Http\Controllers;

use App\Mail\JobEmailNotification;
use App\Models\Applicatio;
use App\Models\Application;
use App\Models\Category;
use App\Models\Company;
use App\Models\Jobdetail;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< Updated upstream
<<<<<<< Updated upstream
use Illuminate\Support\Facades\Mail;
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Validator;

use function Symfony\Component\Clock\now;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        $jobs = Jobdetail::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->with('type')->paginate(10);
=======
        $jobs = Jobdetail::where('user_id', Auth::user()->id)->paginate(5);
>>>>>>> Stashed changes
=======
        $jobs = Jobdetail::where('user_id', Auth::user()->id)->paginate(5);
>>>>>>> Stashed changes
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
            'title'           => 'required|string|min:5|max:200',
            'vacancy'         => 'required|integer|min:1',
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            'location'        => 'required|string|min:3',
            'experience'      => 'required',
=======
=======
>>>>>>> Stashed changes
            'salary'          => 'nullable|string|min:3',
            'location'        => 'required|string|max:50',
            'description'     => 'nullable|string|min:10',
            'benefits'        => 'nullable|string',
            'responsibility'  => 'nullable|string|min:10',
            'qualifications'  => 'nullable|string',
            'keywords'        => 'nullable|string',
>>>>>>> Stashed changes
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
            'user_id' => Auth::user()->id,
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

    public function detail($id)
    {
        $job = Jobdetail::findOrFail($id);
        return view('jobs.detail', compact('job'));
    }

    public function applyjob($id)
    {
        $job = Jobdetail::findOrFail($id);
        $employer_id = $job->user_id;
        $userId = Auth::id();

        if ($job->user_id == $userId) {
            return redirect()
                ->route('job_portal.detail', $id)
                ->with('error', 'You cannot apply to your own job!');
        }

        $alreadyApplied = Application::where('user_id', $userId)
            ->where('jobdetail_id', $id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()
                ->route('job_portal.detail', $id)
                ->with('error', 'You already applied!');
        }

        Application::create([
            'user_id' => $userId,
            'jobdetail_id' => $id,
            'employer_id' => $job->user_id,
            'applied_date' => now(),
        ]);
        $employer_id = User::where('id', $employer_id)->first();
        // $mailData = [
        //     'employer' => $employer_id,
        //     'user' => Auth::user(),
        //     'job' => $job,

        // ];

        // Mail::to()->send(new JobEmailNotification($mailData));

        return redirect()
            ->route('job_portal.detail', $id)
            ->with('success', 'You successfully applied for this job!');
    }
    public function applied()
    {
        $jobApplications = Application::where('user_id', Auth::id())->with(['job', 'job.type'])->paginate(5);
        return view('jobs.applied', compact('jobApplications'));
    }

    public function removeApplication($id)
    {
        $jobApplication = Application::findOrFail($id);

        if ($jobApplication) {
            $jobApplication->delete();
            return redirect()
                ->route('remove.application',)
                ->with('success', 'Your application is successfully deleted!');
        } else {
            return redirect()
                ->route('remove.application')
                ->with('error', 'Job Application Not Found!');
        }
    }
}
