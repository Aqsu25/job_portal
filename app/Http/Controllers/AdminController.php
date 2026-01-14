<?php

namespace App\Http\Controllers;

use App\Models\Request_employer;
use Illuminate\Http\Request;

class AdminController extends Controller
{         
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.dashboard');
    }

    public function requestIndex()
    {
        $requests = Request_employer::with('employer')->where('status', 'pending')->orderBy('created_at', 'ASC')->paginate(5);
        return view('admin.requestlist', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // approve_request 

    public function approve_request($id)
    {
        $request = Request_employer::findOrFail($id);
        $user = $request->employer;
        if (!$user->hasRole($request->request_employer)) {
            $user->assignRole($request->request_employer);
        }
        $request->update([
            'status' => 'approved',
        ]);
        return redirect()->route('adminrequest.employer')->with('success', 'User has been approved as an employer.');
    }
    // reject_request
    public function reject_request($id)
    {
        $reject_request = Request_employer::findOrFail($id);
        $reject_request->update([
            'status' => 'failed']);
        return redirect()->route('adminrequest.employer')->with('success', 'User request has been rejected.');
    }


    public function create() {}

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
