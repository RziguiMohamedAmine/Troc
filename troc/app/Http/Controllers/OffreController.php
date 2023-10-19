<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->query('product');
        // $users = User::with('users')->get();
        // $products = Product::with('products')->get();
        $index = Product::findOrFail($id);
        $categories = Category::with('subcategories')->get();
        return view('frontoffice.offres.create', ['product' => $index,'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'offre-name' => 'required|string|max:255',
    //         'offre-description' => 'required|string',
    //         'offre-product_id' => 'required|exists:products,id',
    //         'offre-value' => 'required|string',
    //         'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);
    //     $offre = new Offre();
    //     $offre->name = $request->input('offre-name');
    //     $offre->description = $request->input('offre-description');


    //     $offre->product_id = $request->input('offre-product_id');
    //     $offre->user_id = Auth::id();

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $imageName);
    //         $offre->image = $imageName;
    //     }

    //     $offre->save();

    //     return redirect()->route('offres.index')->with('success', 'Offre created successfully!');
    // }
    public function store(Request $request)
{
    //     $request->validate([
    //         'offre-name' => 'required|string|max:255|min:3',
    //         'offre-description' => 'required|string|min:10',
    //         'offre-type' => 'required|in:offre,service',
    //         'offre-product_id' => 'required|exists:products,id',
    //         'offre-value' => 'required|string',

    //     ]);


        $offre = new Offre();
        $offre->name = $request->input('offre-name');
        $offre->description = $request->input('offre-description');
        $offre->value = $request->input('offre-value');


        $offre->product_id = $request->input('offre-product_id');



        $offre->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $offre->image = $imageName;
        }

        $offre->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($offre)
    {
       $index = Offre::findOrFail($offre);

         return view('frontoffice.offres.show',['offre' => $index]);
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
