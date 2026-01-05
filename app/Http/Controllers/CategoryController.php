<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(3);
        return view('category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3',
            'status'  => 'required',
        ]);

        // dd($request->all());


        Category::create([
            'name'          => $request->name,
            'status'    => $request->status,
        ]);


        return redirect()
            ->route('categories.index')
            ->with('success', 'Category Created Successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name'     => 'required|string|min:3',
            'status'  => 'required',
        ]);
        // dd($request->all());
        $category->update([
            'name'          => $request->name,
            'status'    => $request->status,
        ]);
        return redirect()
            ->route('categories.index')
            ->with('success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $category->delete();
            return redirect()
                ->route('categories.index')
                ->with('success', 'Category Deleted Successfully!');
        }
    }
}
