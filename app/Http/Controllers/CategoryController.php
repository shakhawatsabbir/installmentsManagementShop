<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Vehicle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $category;
    public function index()
    {

        $this->category = Category::latest('id')->paginate(10);
        return view('admin.product.category', [
            'categories' => $this->category,
        ]);
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
        $this->category = new Category();
        $this->category->name = $request->name;
        $this->category->save();
        return redirect(route('category.index'))->with('massage', 'Category create Successfully ');
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
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
    }
    public function categoryUpdate(Request $request)
    {
        $this->category = Category::find($request->id);
        $this->category->name = $request->name;
        $this->category->update();
        return redirect(route('category.index'))->with('massage', 'Category update Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function searchcategory(Request $request)
    {
        $this->category = Category::find($request->cat_id);
        $data['category'] =   $this->category;
        return response()->json($data);
    }
}
