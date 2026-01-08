<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Jobdetail;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'ASC')->get();
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->route('users.index')->withErrors($validator);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $user->syncRoles([$request->role]);
        return redirect()->route('users.index')->with('success', 'Users Updated Successfully!');
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Users Deleted Successfully!');
        }
        return redirect()->back();
    }

    public function home()
    {
        $categories = Category::where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        $isFeatured = Jobdetail::where('status', 1)->orderBy('created_at', 'DESC')->where('isFeatured', 1)->with('type')->take(4)->get();
        $latestJob = Jobdetail::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('homes.home', compact('categories', 'isFeatured', 'latestJob'));
    }

    public function likejobpost($id)
    {
        // dd($id);

        $userId = Auth::id();
        $count = Like::where('user_id', $userId)->where('jobdetail_id', $id)->first();
        if ($count) {
            $count->delete();
            return redirect()->route('job_portal.detail', $id)->with('success', 'UnLiked Successfully!');
        } else {
            Like::create([
                'user_id' => $userId,
                'jobdetail_id' => $id,
            ]);
            return redirect()->route('job_portal.detail', $id)->with('success', 'Like Added Successfully!');
        }
    }
}
