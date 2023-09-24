<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('backoffice.subcategories.index',['subcategories'=>Subcategory::all()]);
    // }

    public function index(Request $request)
    {
        $categoryId = $request->query('categorie');

    if ($categoryId !== null) {
        // Filter subcategories by the provided category ID
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
    } else {
        // If no category ID provided, show all subcategories
        $subcategories = Subcategory::all();
    }

    // Pass the subcategories to the view
    return view('backoffice.subcategories.index', ['subcategories' => $subcategories]);
    }


    public function indexFront()
    {
            $subcategories=Subcategory::all(); 
            return view('frontoffice.home', ['subcategories' => $subcategories]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.subcategories.create',['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategorie-name'=>'required',
            'subcategorie-category_id' => 'required|exists:categories,id',
        ]);
        $subcategorie =  new Subcategory();
        $subcategorie->name = strip_tags($request->input('subcategorie-name'));
        $subcategorie->category_id = strip_tags($request->input('subcategorie-category_id'));

        $subcategorie->save();
        return redirect()->route('subcategories.index');
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
    public function edit($subcategorie)
    {

        $subcategorie = Subcategory::with('category')->findOrFail($subcategorie);
        $categories = Category::all(); // Optionally, you can pass all categories for selection
    
        return view('backoffice.subcategories.edit', compact('subcategorie', 'categories'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subcategorie)
    {
        $request->validate([
            'subcategorie-name'=>'required',
            'subcategorie-category_id' => 'required|exists:categories,id',
        ]);

        $subcategory = Subcategory::findOrFail($subcategorie);
        $subcategory->name = $request->input('subcategorie-name');
        $subcategory->category_id = $request->input('subcategorie-category_id');
        $subcategory->save();
    
        return redirect()->route('subcategories.index',$subcategorie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subcategorie)
    {
        $delete=Subcategory::findOrFail($subcategorie);
        $delete->delete();
        return redirect()->route('subcategories.index');
    }
}
