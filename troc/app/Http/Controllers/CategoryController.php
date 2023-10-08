<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
    $categoriesWithPercentages = [];

    foreach ($categories as $category) {
        $subcategoryProductsCount = $category->subcategories->sum(function ($subcategory) {
            return $subcategory->products->count();
        });

        $totalProducts = Product::count();

        $percentage = ($subcategoryProductsCount / $totalProducts) * 100;

        $categoriesWithPercentages[] = [
            'category' => $category,
            'percentage' => $percentage,
        ];
    }

    return view('backoffice.categories.index', [
        'categories' => $categories,
        'categoriesWithPercentages' => $categoriesWithPercentages,
    ]);
    }

  

    public function indexFront()
    {
            $products = Product::all();
            $categories = Category::with('subcategories')->get();
            return view('frontoffice.home', compact('categories','products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie-name'=>'required',
            'categorie-description'=>'required',
        ]);
        $categorie =  new Category();
        $categorie->name = strip_tags($request->input('categorie-name'));
        $categorie->description = strip_tags($request->input('categorie-description'));
        $categorie->icon = strip_tags($request->input('categorie-icon'));

        $categorie->save();
        return redirect()->route('categories.index');
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
    public function edit($categorie)
    {
        $categories = Category::all();

        return view('backoffice.categories.edit',[
            'categorie' => Category::findOrFail($categorie),
            'categories'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categorie)
    {
       
            $request->validate([
                'categorie-name'=>'required',
                'categorie-description'=>'required',
            ]);
            $updated = Category::findOrFail($categorie);
            $updated->name = strip_tags($request->input('categorie-name'));
            $updated->description = strip_tags($request->input('categorie-description'));
    
            $updated->save();
            return redirect()->route('categories.index',$categorie);
    
   
    }

    // public function updateName(Request $request, $id)
    // {
    //      $category = Category::find($id);
    //      $category = Category::where('id',$id)->first();
    //      $category->name = $request->value;
    //      $category->save();
    // }

  


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categorie)
    {
        $delete=Category::findOrFail($categorie);
        $delete->delete();
        return redirect()->route('categories.index');
    }
}
