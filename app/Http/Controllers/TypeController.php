<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('created_at', 'DESC')->paginate(3);
        return view('types.list', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        Type::create([
            'name'          => $request->name,
            'status'        => $request->status,
        ]);


        return redirect()
            ->route('types.index')
            ->with('success', 'Type Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, $id)
    {
        $type = Type::findOrFail($id);
        $type->update([
            'name'          => $request->name,
            'status'        => $request->status,
        ]);


        return redirect()
            ->route('types.index')
            ->with('success', 'Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $type = Type::findOrFail($id);
            $type->delete();

            return redirect()
                ->route('types.index')
                ->with('success', 'Type Deleted Successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()
                ->route('types.index')
                ->with('error', 'Type not found!');
        }
    }
}
